import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { User } from 'src/app/_models/user';
import { AuthenticationService } from 'src/app/_services/authentication.service';
import { Md5 } from 'ts-md5/dist/md5';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css'],
})
export class HeaderComponent implements OnInit {
  currentUser: User;
  constructor(
    private router: Router,
    private authenticationService: AuthenticationService
  ) {
    this.authenticationService.currentUser.subscribe(
      (x) => (this.currentUser = x)
    );
  }
  logout() {
    this.authenticationService.logout();
    this.router.navigate(['/dang-nhap']);
  }

  ngOnInit(): void {}

  getGavatar() {
    const md5 = new Md5();
    return (
      'http://www.gravatar.com/avatar/' +
      md5.appendStr(this.currentUser.email).end()
    );
  }
}
