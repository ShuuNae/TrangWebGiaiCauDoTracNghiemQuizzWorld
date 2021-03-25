import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { Topic } from '../_models/topic';
import { UserRanking } from '../_models/user_ranking';

@Injectable({ providedIn: 'root' })
export class TopicService {
  constructor(private http: HttpClient) {}

  getAll() {
    return this.http.get<Topic[]>(`${environment.apiUrl}/topic/read.php`);
  }

  getUserRanking(topicId: number = -1) {
    if (topicId > 0) {
      return this.http.get<UserRanking[]>(
        `${environment.apiUrl}/topic/ranking_by_topic.php?id=${topicId}`
      );
    } else {
      return this.http.get<UserRanking[]>(
        `${environment.apiUrl}/topic/ranking_all.php`
      );
    }
  }

  create(topic: Topic) {
    return this.http.post<any>(`${environment.apiUrl}/topic/create.php`, topic);
  }

  update(topic: Topic) {
    return this.http.post<any>(`${environment.apiUrl}/topic/update.php`, topic);
  }

  readOne(id: number) {
    return this.http.get<Topic>(
      `${environment.apiUrl}/topic/read_one.php?id=${id}`
    );
  }

  delete(id: number) {
    return this.http.post<any>(`${environment.apiUrl}/topic/delete.php`, {
      id: id,
    });
  }
}
