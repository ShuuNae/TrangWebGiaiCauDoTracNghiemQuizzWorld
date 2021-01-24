import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-all-users',
  templateUrl: './all-users.component.html',
  styleUrls: ['./all-users.component.css']
})
export class AllUsersComponent implements OnInit {
  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/TaiKhoan/';

  constructor(private http: HttpClient) { }

  Login() {
    return this.http.get('${this.url}select.php').subscribe((data: any) => {
      console.log(data);
      alert(data);
    })
  }

  ngOnInit(): void {
  }

}
