import { DatePipe } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Subscription, timer } from 'rxjs';
import { first } from 'rxjs/operators';
import { Quizz } from 'src/app/_models/quizz';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { UserQuizz } from 'src/app/_models/user_quizz';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { QuizzService } from 'src/app/_services/quizz.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserQuizzService } from 'src/app/_services/user_quizz.service';
import { Md5 } from 'ts-md5/dist/md5';

@Component({
  selector: 'app-quizz',
  templateUrl: './quizz.component.html',
  styleUrls: ['./quizz.component.css'],
})
export class QuizzComponent implements OnInit {
  currentUser: User;
  currentTopic: Topic;
  quizzs: Quizz[];
  ans = ['', '', '', '', '', '', '', '', '', ''];
  isCompleted = false;

  currentUserQuizz: UserQuizz = new UserQuizz();

  countDown: Subscription;

  seconds = 10 * 60;

  transform(value: number): string {
    const hours: number = Math.floor(value / 3600);
    const minutes: number = Math.floor((value % 3600) / 60);
    return (
      ('00' + hours).slice(-2) +
      ':' +
      ('00' + minutes).slice(-2) +
      ':' +
      ('00' + Math.floor(value - minutes * 60)).slice(-2)
    );
  }

  complete() {
    if (confirm('Bạn có chắc đã hoàn thành phần thi?')) {
      this.countDown.closed = true;
      this.countDown.unsubscribe();
      this.isCompleted = true;
      this.currentUserQuizz.finish_at = this.datepipe.transform(
        new Date(),
        'yyyy-MM-dd HH:mm:ss'
      );

      this.currentUserQuizz.quizz_data = JSON.stringify(this.quizzs);

      var count = 0;
      for (let i = 0; i < this.quizzs.length; i++) {
        if (this.ans[i] == this.quizzs[i].correct) {
          count++;
        }
      }
      this.currentUserQuizz.score = (count * 10).toPrecision(2);

      console.log(this.currentUserQuizz);
      this.userQuizzService
        .create(this.currentUserQuizz)
        .pipe(first())
        .subscribe((data) => {
          // this.router.navigate(['/quan-ly-cau-hoi']);
          this.loading = false;
        });
    }
  }

  changeAns(index, alphabet) {
    if (!this.isCompleted) this.ans[index] = alphabet;
  }

  extractCircle(index, alphabet) {
    if (this.isCompleted) {
      var correctAlphabet = this.quizzs[index].correct;
      if (correctAlphabet == alphabet && alphabet == this.ans[index]) {
        return 'border rounded border-success px-2';
      } else if (alphabet == this.ans[index]) {
        return 'border rounded border-dark px-2';
      } else if (correctAlphabet == alphabet) {
        return 'border rounded border-danger px-2';
      } else return '';
    } else {
      return this.ans[index] == alphabet
        ? 'border rounded border-dark px-2'
        : '';
    }
  }

  loading = false;

  constructor(
    private formBuilder: FormBuilder,
    private route: ActivatedRoute,
    private router: Router,
    public datepipe: DatePipe,
    private topicService: TopicService,
    private userQuizzService: UserQuizzService,
    private quizzService: QuizzService,
    private authenticationService: AuthenticationService
  ) {
    this.authenticationService.currentUser.subscribe(
      (x) => (this.currentUser = x)
    );
  }

  ngOnInit(): void {
    const topicId = this.route.snapshot.paramMap.get('id');
    this.topicService
      .readOne(Number.parseInt(topicId))
      .pipe(first())
      .subscribe((topic) => {
        this.currentTopic = topic;
        this.loading = false;
      });

    this.quizzService
      .randomByTopic(Number.parseInt(topicId))
      .pipe(first())
      .subscribe((quizzs) => {
        this.loading = false;
        this.quizzs = quizzs;

        this.startQuizz();
      });
  }

  getGavatar() {
    const md5 = new Md5();
    return (
      'http://www.gravatar.com/avatar/' +
      md5.appendStr(this.currentUser.email).end()
    );
  }
  startQuizz() {
    this.currentUserQuizz.start_at = this.datepipe.transform(
      new Date(),
      'yyyy-MM-dd HH:mm:ss'
    );
    this.currentUserQuizz.user_id = this.currentUser.id;
    this.currentUserQuizz.topic_id = this.currentTopic.id;
    this.currentUserQuizz.score = (0).toPrecision(2);

    this.countDown = timer(0, 1000).subscribe(() => {
      --this.seconds;
      if (this.seconds <= 0) {
        this.complete();
      }
    });
  }
  ngOnDestroy() {
    this.countDown = null;
  }
}
