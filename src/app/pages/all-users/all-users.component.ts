import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-all-users',
  templateUrl: './all-users.component.html',
  styleUrls: ['./all-users.component.css'],
})
export class AllUsersComponent implements OnInit {
  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/TaiKhoan/';
  accounts = [];
  postData = {
    test: 'test',
  }
  sendData = {};
  message;

  constructor(private http: HttpClient) { }

  GetAllUsers() {
    this.http.get(this.url+'select.php').subscribe((data: any) => {
      console.log(data);
      alert(data);
      // for (let taikhoan_data in data) {
      //   if (data.hasOwnProperty(taikhoan_data)) {
      //     this.accounts.push(data[taikhoan_data]);
      //   }
      // }
    })
  }

  DeleteUser(Username) {
    this.sendData = {
      Username: Username,
    }
    this.http.post(this.url+'/delete.php', this.sendData).toPromise().then((data : any) => {
      console.log(data);
      this.message = data.message;
      console.log(data.message);
    });
  }

  UpdateUser(Username, Password, IsAdmin) {
    this.sendData = {
      Username: Username,
      Password: Password,
      IsAdmin: IsAdmin,
    }
    this.http.post(this.url+'/update.php', this.sendData).toPromise().then((data : any) => {
      console.log(data);
      this.message = data.message;
      // console.log(data.message);
    });
  }

  ngOnInit(): void {
  }

}
