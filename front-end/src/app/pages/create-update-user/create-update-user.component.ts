import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { first } from 'rxjs/operators';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { UserService } from 'src/app/_services/user.service';

@Component({
  selector: 'app-create-user',
  templateUrl: './create-update-user.component.html',
  styleUrls: ['./create-update-user.component.css'],
})
export class CreateUserComponent implements OnInit {
  curerentUser: User;
  logedUser: User;
  title: string;

  form: FormGroup;
  loading = false;
  submitted = false;
  returnUrl: string;
  error = '';

  roles = ['admin', 'user'];
  genders = [
    [1, 'Nam'],
    [2, 'Nữ'],
  ];

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
      return;
    }
    this.logedUser = this.authenticationService.currentUserValue;
  }
  ngOnInit(): void {
    this.form = this.formBuilder.group({
      id: [''],
      username: ['', Validators.required],
      password: ['', Validators.required],
      fullname: ['', Validators.required],
      gender: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      role: ['', Validators.required],
    });

    const userId = this.route.snapshot.paramMap.get('id');
    if (userId) {
      this.title = 'Sửa tài khoản cho người dùng';
      this.loading = true;
      // Lấy các thông tin của người dùng
      this.userService
        .readOne(Number.parseInt(userId))
        .pipe(first())
        .subscribe((users) => {
          this.curerentUser = users;
          if (this.curerentUser.id == this.logedUser.id) {
            this.title = 'Cập nhật hồ sơ của bạn';
          }
          this.form.controls['id'].setValue(this.curerentUser.id);
          this.form.controls['username'].setValue(this.curerentUser.username);
          this.form.controls['password'].setValue(this.curerentUser.password);
          this.form.controls['fullname'].setValue(this.curerentUser.fullname);
          this.form.controls['gender'].setValue(this.curerentUser.gender);
          this.form.controls['email'].setValue(this.curerentUser.email);
          this.form.controls['role'].setValue(this.curerentUser.role);
          this.loading = false;
        });
    } else {
      this.title = 'Thêm tài khoản cho người dùng';
      this.loading = false;
    }
  }

  changeGender(e) {
    this.form.controls['gender'].setValue(e.target.value);
  }
  changeRole(e) {
    this.form.controls['role'].setValue(e.target.value);
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
      if (!this.f.gender.value) {
        if (this.error.length > 0) {
          this.error += ' ';
        }
        this.error += 'Vui lòng chọn giới tính.';
      }
      if (!this.f.role.value) {
        if (this.error.length > 0) {
          this.error += ' ';
        }
        this.error += 'Vui lòng chọn quyền.';
      }
      return;
    }

    this.loading = true;
    if (this.f.id.value) {
      console.log(this.form.value);
      this.userService
        .update(this.form.value)
        .pipe(first())
        .subscribe(
          (data) => {
            this.router.navigate(['/danh-sach-nguoi-dung']);
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    } else {
      this.userService
        .create(this.form.value)
        .pipe(first())
        .subscribe(
          (data) => {
            this.router.navigate(['/danh-sach-nguoi-dung']);
          },
          (error) => {
            this.error = error;
            this.loading = false;
          }
        );
    }
  }
}
