import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { Quizz } from '../_models/quizz';

@Injectable({ providedIn: 'root' })
export class QuizzService {
  constructor(private http: HttpClient) {}

  getAll(topicId: number = -1) {
    if (topicId > 0) {
      return this.http.get<Quizz[]>(
        `${environment.apiUrl}/quizz/read_by_topic.php?topic_id=${topicId}`
      );
    } else {
      return this.http.get<Quizz[]>(`${environment.apiUrl}/quizz/read.php`);
    }
  }

  randomByTopic(topicId: number) {
    return this.http.get<Quizz[]>(
      `${environment.apiUrl}/quizz/random_by_topic.php?topic_id=${topicId}`
    );
  }

  create(quizz: Quizz) {
    return this.http.post<any>(`${environment.apiUrl}/quizz/create.php`, quizz);
  }

  update(quizz: Quizz) {
    return this.http.post<any>(`${environment.apiUrl}/quizz/update.php`, quizz);
  }

  readOne(id: number) {
    return this.http.get<Quizz>(
      `${environment.apiUrl}/quizz/read_one.php?id=${id}`
    );
  }

  delete(id: number) {
    return this.http.post<any>(`${environment.apiUrl}/quizz/delete.php`, {
      id: id,
    });
  }
}
