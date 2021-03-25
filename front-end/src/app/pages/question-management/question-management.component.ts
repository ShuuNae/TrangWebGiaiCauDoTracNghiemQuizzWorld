import { Component, OnInit } from '@angular/core';
import { first } from 'rxjs/operators';
import { Quizz } from 'src/app/_models/quizz';
import { Topic } from 'src/app/_models/topic';
import { QuizzService } from 'src/app/_services/quizz.service';
import { TopicService } from 'src/app/_services/topic.service';

@Component({
  selector: 'app-question-management',
  templateUrl: './question-management.component.html',
  styleUrls: ['./question-management.component.css'],
})
export class QuestionManagementComponent implements OnInit {
  loading = false;
  selectedTopicName = '';
  topics: Topic[];
  quizzs: Quizz[];

  constructor(
    private topicService: TopicService,
    private quizzService: QuizzService
  ) {}

  ngOnInit(): void {
    this.loading = true;
    this.topicService
      .getAll()
      .pipe(first())
      .subscribe((topics) => {
        this.loading = false;
        this.topics = topics;
      });
    this.loadQuizz();
  }

  loadQuizz(topicName = 'Tất cả', topicId = -1) {
    this.loading = true;
    this.quizzService
      .getAll(topicId)
      .pipe(first())
      .subscribe(
        (quizzs) => {
          this.selectedTopicName = topicName;
          this.loading = false;
          this.quizzs = quizzs;
        },
        (error) => {
          this.loading = false;
          alert('Chưa có câu trả lời nào dành cho chủ đề này');
        }
      );
  }
}
