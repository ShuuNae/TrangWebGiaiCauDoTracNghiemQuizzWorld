import { Component, OnInit } from '@angular/core';
import { first } from 'rxjs/operators';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserQuizzService } from 'src/app/_services/user_quizz.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit {
  loading = false;
  topics: Topic[];
  currentUser: User;

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
        this.topics = topics;
        for (let i = 0; i < this.topics.length; i++) {
          this.userQuizzService
            .maxScores(this.currentUser.id, this.topics[i].id)
            .pipe(first())
            .subscribe((counted) => {
              this.topics[i].count = counted;
            });
        }
        this.loading = false;
      });
  }
}
