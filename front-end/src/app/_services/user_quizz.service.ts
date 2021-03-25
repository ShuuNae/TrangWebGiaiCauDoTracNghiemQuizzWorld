import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { Quizz } from '../_models/quizz';
import { UserQuizz } from '../_models/user_quizz';

@Injectable({ providedIn: 'root' })
export class UserQuizzService {
  constructor(private http: HttpClient) {}

  getAll(userId: number, topicId: number = -1) {
    var uri = `${environment.apiUrl}/user-quizz/read.php?user_id=${userId}`;
    if (topicId > 0) {
      uri += `&topic_id=${topicId}`;
    }
    return this.http.get<UserQuizz[]>(uri);
  }

  counForTopic(userId: number, topicId: number = -1) {
    if (topicId <= 0) {
      return this.http.get<number>(
        `${environment.apiUrl}/user-quizz/count_all.php?user_id=${userId}`
      );
    } else {
      return this.http.get<number>(
        `${environment.apiUrl}/user-quizz/count_for_topic.php?user_id=${userId}&topic_id=${topicId}`
      );
    }
  }

  maxScores(userId: number, topicId: number) {
    return this.http.get<number>(
      `${environment.apiUrl}/user-quizz/max_scores.php?user_id=${userId}&topic_id=${topicId}`
    );
  }

  create(userQuizz: UserQuizz) {
    return this.http.post<any>(
      `${environment.apiUrl}/user-quizz/create.php`,
      userQuizz
    );
  }

  update(userQuizz: UserQuizz) {
    return this.http.post<any>(
      `${environment.apiUrl}/user-quizz/update.php`,
      userQuizz
    );
  }

  readOne(id: number) {
    return this.http.get<UserQuizz>(
      `${environment.apiUrl}/user-quizz/read_one.php?id=${id}`
    );
  }

  delete(id: number) {
    return this.http.post<any>(`${environment.apiUrl}/user-quizz/delete.php`, {
      id: id,
    });
  }
}
