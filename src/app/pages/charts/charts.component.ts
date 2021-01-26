import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-charts',
  templateUrl: './charts.component.html',
  styleUrls: ['./charts.component.css']
})
export class ChartsComponent implements OnInit {

  sendData = {};
  message ;

  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/KetQua/';
  constructor(private http: HttpClient) { }

  getAllKetQua() {
    this.http.get(this.url+'select.php').subscribe((data: any) => {
      console.log(data);
      alert(data);
    })
  }

  DeleteKetQua(MaTS) {
    this.sendData = {
      MaTS: MaTS,
    }
    this.http.post(this.url+'/delete.php', this.sendData).toPromise().then((data : any) => {
      console.log(data);
      this.message = data.message;
      console.log(data.message);
    });
  }

  UpdateKetQua(MaTS, ThoiGian, KetQua) {
    this.sendData = {
      MaTS: MaTS,
      ThoiGian: ThoiGian,
      KetQua: KetQua,
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
