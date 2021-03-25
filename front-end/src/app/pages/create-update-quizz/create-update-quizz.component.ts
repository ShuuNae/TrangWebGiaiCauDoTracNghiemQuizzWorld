import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { first } from 'rxjs/operators';
import { Quizz } from 'src/app/_models/quizz';
import { Topic } from 'src/app/_models/topic';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { QuizzService } from 'src/app/_services/quizz.service';
import { TopicService } from 'src/app/_services/topic.service';
import { UserService } from 'src/app/_services/user.service';

@Component({
  selector: 'app-create-update-quizz',
  templateUrl: './create-update-quizz.component.html',
  styleUrls: ['./create-update-quizz.component.css'],
})
export class CreateUpdateQuizzComponent implements OnInit {
  topics: Topic[];
  currentQuizz: Quizz;
  title: string;

  form: FormGroup;
  loading = false;
  submitted = false;
  error = '';

  corrects = ['A', 'B', 'C', 'D'];

  constructor(
    private formBuilder: FormBuilder,
    private route: ActivatedRoute,
    private router: Router,
    private topicService: TopicService,
    private quizzService: QuizzService,
    private authenticationService: AuthenticationService
  ) {
    // redirect to home if already logged in
    if (!this.authenticationService.currentUserValue) {
      this.router.navigate(['/']);
      return;
    }
  }

  changeCorrectAns(e) {
    this.form.controls['correct'].setValue(e.target.value);
  }
  changeTopic(e) {
    this.form.controls['topic_id'].setValue(e.target.value);
  }

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      id: [''],
      topic_id: ['', Validators.required],
      question: ['', Validators.required],
      ansA: ['', Validators.required],
      ansB: ['', Validators.required],
      ansC: ['', Validators.required],
      ansD: ['', Validators.required],
      correct: ['', Validators.required],
    });
    this.topicService
      .getAll()
      .pipe(first())
      .subscribe((topics) => {
        this.loading = false;
        this.topics = topics;
      });

    const quizzId = this.route.snapshot.paramMap.get('id');
    if (quizzId) {
      this.title = 'Sửa câu hỏi';
      this.loading = true;
      // Lấy các thông tin của người dùng
      this.quizzService
        .readOne(Number.parseInt(quizzId))
        .pipe(first())
        .subscribe((users) => {
          this.currentQuizz = users;
          this.form.controls['id'].setValue(this.currentQuizz.id);
          this.form.controls['topic_id'].setValue(this.currentQuizz.topic_id);
          this.form.controls['question'].setValue(this.currentQuizz.question);
          this.form.controls['ansA'].setValue(this.currentQuizz.ansA);
          this.form.controls['ansB'].setValue(this.currentQuizz.ansB);
          this.form.controls['ansC'].setValue(this.currentQuizz.ansC);
          this.form.controls['ansD'].setValue(this.currentQuizz.ansD);
          this.form.controls['correct'].setValue(this.currentQuizz.correct);
          this.loading = false;
        });
    } else {
      this.title = 'Thêm câu hỏi';
      this.loading = false;
    }
  }

  confirmDelete(quizz) {
    if (confirm('Bạn có chắc muốn xóa câu hỏi có "' + quizz.question + '"?')) {
      this.loading = true;
      this.quizzService
        .delete(quizz.id)
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
      this.error = '';
      if (!this.f.correct.value) {
        if (this.error.length > 0) {
          this.error += ' ';
        }
        this.error += 'Vui lòng chọn đáp án đúng.';
      }
      if (!this.f.topic_id.value) {
        if (this.error.length > 0) {
          this.error += ' ';
        }
        this.error += 'Vui lòng chọn chủ đề.';
      }
      return;
    }

    this.loading = true;
    if (this.f.id.value) {
      this.quizzService
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
      this.quizzService
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
