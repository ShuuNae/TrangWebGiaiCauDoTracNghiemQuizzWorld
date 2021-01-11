import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-all-users',
  templateUrl: './all-users.component.html',
  styleUrls: ['./all-users.component.css']
})
export class AllUsersComponent implements OnInit {
  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/NguoiDung/';

  constructor(private http: HttpClient) { }

  Login() {
    return this.http.get('${this.url}SelectAllUser.php');
  }

  ngOnInit(): void {
    this.Login();
  }

}
