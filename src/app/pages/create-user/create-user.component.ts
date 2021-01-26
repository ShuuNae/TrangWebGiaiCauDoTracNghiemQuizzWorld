import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-create-user',
  templateUrl: './create-user.component.html',
  styleUrls: ['./create-user.component.css']
})
export class CreateUserComponent implements OnInit {

  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/ThiSinh/';

  sendData = {};
  message;

  constructor(private http: HttpClient) { }

  ThemThiSinh(ThiSinh) {
    this.http.post(this.url+'/update.php', ThiSinh).toPromise().then((data : any) => {
      console.log(data);
      this.message = data.message;
      // console.log(data.message);
    });
  }

  ngOnInit(): void {
  }

}
