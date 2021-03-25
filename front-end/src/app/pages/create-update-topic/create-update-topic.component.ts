import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { first } from 'rxjs/operators';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserService } from 'src/app/_services/user.service';

@Component({
  selector: 'app-create-update-topic',
  templateUrl: './create-update-topic.component.html',
  styleUrls: ['./create-update-topic.component.css'],
})
export class CreateUpdateTopicComponent implements OnInit {
  currentTopic: Topic;
  title: string;

  form: FormGroup;
  loading = false;
  submitted = false;
  error = '';

  constructor(
    private formBuilder: FormBuilder,
    private route: ActivatedRoute,
    private router: Router,
    private topicService: TopicService,
    private authenticationService: AuthenticationService
  ) {
    // redirect to home if already logged in
    if (!this.authenticationService.currentUserValue) {
      this.router.navigate(['/']);
      return;
    }
  }
  ngOnInit(): void {
    this.form = this.formBuilder.group({
      id: [''],
      icon: ['', Validators.required],
      name: ['', Validators.required],
      description: ['', Validators.required],
    });

    const topicId = this.route.snapshot.paramMap.get('id');
    if (topicId) {
      this.title = 'Sửa chủ đề';
      this.loading = true;
      // Lấy các thông tin của người dùng
      this.topicService
        .readOne(Number.parseInt(topicId))
        .pipe(first())
        .subscribe((users) => {
          this.currentTopic = users;
          this.form.controls['id'].setValue(this.currentTopic.id);
          this.form.controls['name'].setValue(this.currentTopic.name);
          this.form.controls['icon'].setValue(this.currentTopic.icon);
          this.form.controls['description'].setValue(
            this.currentTopic.description
          );
          this.loading = false;
        });
    } else {
      this.title = 'Thêm chủ đề';
      this.loading = false;
    }
  }

  confirmDelete(topic) {
    if (confirm('Bạn có chắc muốn xóa chủ đề có tên "' + topic.name + '"?')) {
      this.loading = true;
      this.topicService
        .delete(topic.id)
        .pipe(first())
        .subscribe(
          (data) => {
            this.router.navigate(['/quan-ly-cau-hoi']);
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    }
  }

  // convenience getter for easy access to form fields
  get f() {
    return this.form.controls;
  }

  onSubmit() {
    this.submitted = true;

    // stop here if form is invalid
    if (this.form.invalid) {
      return;
    }

    this.loading = true;
    if (this.f.id.value) {
      this.topicService
        .update(this.form.value)
        .pipe(first())
        .subscribe(
          (data) => {
            this.router.navigate(['/quan-ly-cau-hoi']);
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    } else {
      this.topicService
        .create(this.form.value)
        .pipe(first())
        .subscribe(
          (data) => {
            this.router.navigate(['/quan-ly-cau-hoi']);
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    }
  }
}
