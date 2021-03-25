import { Component, OnInit } from '@angular/core';
import { first } from 'rxjs/operators';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { UserQuizz } from 'src/app/_models/user_quizz';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserQuizzService } from 'src/app/_services/user_quizz.service';
import { Md5 } from 'ts-md5/dist/md5';

@Component({
  selector: 'app-ranking',
  templateUrl: './ranking.component.html',
  styleUrls: ['./ranking.component.css'],
})
export class RankingComponent implements OnInit {
  loading = false;
  topics: Topic[];
  currentUser: User;
  users: User[];

  title = 'Xếp hạng chung';
  currentUserQuizzs: UserQuizz[];
  selectedTopic: Topic;

  selectTopic(topic: Topic = null) {
    var topicId = -1;
    if (!topic) {
      topicId = -1;
      this.title = 'Xếp hạng chung';
    } else {
      topicId = topic.id;
    }
    this.topicService
      .getUserRanking(topicId)
      .pipe(first())
      .subscribe(
        (users) => {
          if (topicId > 0) this.title = 'Xếp hạng theo chủ đề: ' + topic.name;
          this.users = users;
        },
        (err) => {
          alert('Hiện chưa có ai thi chủ đề này');
        }
      );
  }

  countAll = 0;

  constructor(
    private topicService: TopicService,
    private userQuizzService: UserQuizzService,
    private authenticationService: AuthenticationService
  ) {
    this.authenticationService.currentUser.subscribe(
      (x) => (this.currentUser = x)
    );
  }

  ngOnInit(): void {
    this.loading = true;

    this.topicService
      .getAll()
      .pipe(first())
      .subscribe((topics) => {
        this.loading = false;
        this.topics = topics;
      });

    this.selectTopic();
  }
  getGavatar(email) {
    const md5 = new Md5();
    return 'http://www.gravatar.com/avatar/' + md5.appendStr(email).end();
  }
}
