import { Component, OnInit } from '@angular/core';
import { first } from 'rxjs/operators';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { UserQuizz } from 'src/app/_models/user_quizz';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserQuizzService } from 'src/app/_services/user_quizz.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css'],
})
export class HistoryComponent implements OnInit {
  loading = false;
  topics: Topic[];
  currentUser: User;

  title = 'Tất cả bài thi';
  currentUserQuizzs: UserQuizz[];
  selectedTopic: Topic;

  selectTopic(topic: Topic = null) {
    var topicId = -1;
    if (!topic) {
      topicId = -1;
      this.title = 'Tất cả bài thi';
    }
    this.userQuizzService
      .getAll(this.currentUser.id, topicId)
      .pipe(first())
      .subscribe((userQuizzs) => {
        this.currentUserQuizzs = userQuizzs;
      });
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

    this.userQuizzService
      .counForTopic(this.currentUser.id)
      .pipe(first())
      .subscribe((counted) => {
        this.countAll = counted;
      });

    this.topicService
      .getAll()
      .pipe(first())
      .subscribe((topics) => {
        this.loading = false;
        this.topics = topics;
        for (let i = 0; i < this.topics.length; i++) {
          this.userQuizzService
            .counForTopic(this.currentUser.id, this.topics[i].id)
            .pipe(first())
            .subscribe((counted) => {
              this.topics[i].count = counted;
            });
        }
      });

    this.selectTopic();
  }
}
