import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { User } from '../_models/user';

@Injectable({ providedIn: 'root' })
export class UserService {
  constructor(private http: HttpClient) {}

  getAll() {
    return this.http.get<User[]>(`${environment.apiUrl}/user/read.php`);
  }

  create(user: User) {
    return this.http.post<any>(`${environment.apiUrl}/user/create.php`, user);
  }

  update(user: User) {
    return this.http.post<any>(`${environment.apiUrl}/user/update.php`, user);
  }

  readOne(userId: number) {
    return this.http.get<User>(
      `${environment.apiUrl}/user/read_one.php?id=${userId}`
    );
  }

  delete(id: number) {
    return this.http.post<any>(`${environment.apiUrl}/user/delete.php`, {
      id: id,
    });
  }
}
