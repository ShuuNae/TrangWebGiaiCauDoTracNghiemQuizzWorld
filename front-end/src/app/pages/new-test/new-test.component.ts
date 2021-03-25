import { Component, OnInit } from '@angular/core';
import { first } from 'rxjs/operators';
import { Topic } from 'src/app/_models/topic';
import { TopicService } from 'src/app/_services/topic.service';

@Component({
  selector: 'app-new-test',
  templateUrl: './new-test.component.html',
  styleUrls: ['./new-test.component.css'],
})
export class NewTestComponent implements OnInit {
  loading = false;
  topics: Topic[];

  constructor(private topicService: TopicService) {}

  ngOnInit(): void {
    this.loading = true;
    this.topicService
      .getAll()
      .pipe(first())
      .subscribe((topics) => {
        this.loading = false;
        this.topics = topics;
      });
  }
}
