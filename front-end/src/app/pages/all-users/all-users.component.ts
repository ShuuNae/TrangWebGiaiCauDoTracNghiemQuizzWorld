import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { first } from 'rxjs/operators';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { UserService } from 'src/app/_services/user.service';
import { Md5 } from 'ts-md5/dist/md5';

@Component({
  selector: 'app-all-users',
  templateUrl: './all-users.component.html',
  styleUrls: ['./all-users.component.css'],
})
export class AllUsersComponent implements OnInit {
  users: User[];

  form: FormGroup;
  loading = false;
  submitted = false;
  returnUrl: string;
  error = '';

  constructor(
    private formBuilder: FormBuilder,
    private route: ActivatedRoute,
    private router: Router,
    private userService: UserService,
    private authenticationService: AuthenticationService
  ) {
    // redirect to home if already logged in
    if (!this.authenticationService.currentUserValue) {
      this.router.navigate(['/']);
    }
  }

  confirmDelete(user: User) {
    if (confirm('Bạn có chắc muốn xóa người dùng "' + user.fullname + '"?')) {
      this.loading = true;
      this.userService
        .delete(user.id)
        .pipe(first())
        .subscribe(
          (data) => {
            location.reload();
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    }
  }

  ngOnInit(): void {
    this.loading = true;
    this.userService
      .getAll()
      .pipe(first())
      .subscribe((users) => {
        this.loading = false;
        this.users = users;
      });
    this.form = this.formBuilder.group({
      keyword: ['', Validators.required],
    });
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
  }

  getGavatar(email) {
    const md5 = new Md5();
    return 'http://www.gravatar.com/avatar/' + md5.appendStr(email).end();
  }
}
