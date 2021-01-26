import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {

  url = 'http://localhost/php/TrangWebGiaiCauDoTracNghiemQuizzWorld/Model/KetQua/';
  constructor(private http: HttpClient) { }

  ketqua: any;
  ketquass = [];

  getAllKetQua() {
    this.http.get(this.url+'select.php').subscribe((data: any) => {
      // console.log(data);
      // alert(data);
      
      this.ketqua = data.ketqua_data;
      console.log(this.ketqua[0].KetQua);

    
    })

  }

  ngOnInit(): void {
  }

}
