import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { JwtInterceptor } from './_helpers/jwt.interceptor';
import { ErrorInterceptor } from './_helpers/error.interceptor';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { HeaderComponent } from './layouts/header/header.component';
import { SidebarComponent } from './layouts/sidebar/sidebar.component';
import { HomeComponent } from './pages/home/home.component';
import { FooterComponent } from './layouts/footer/footer.component';
import { HistoryComponent } from './pages/history/history.component';
import { NewTestComponent } from './pages/new-test/new-test.component';
import { ChartsComponent } from './pages/charts/charts.component';
import { AllUsersComponent } from './pages/all-users/all-users.component';
import { CreateUserComponent } from './pages/create-update-user/create-update-user.component';
import { QuestionManagementComponent } from './pages/question-management/question-management.component';
import { LoginComponent } from './pages/login/login.component';
import { CreateUpdateQuizzComponent } from './pages/create-update-quizz/create-update-quizz.component';
import { CreateUpdateTopicComponent } from './pages/create-update-topic/create-update-topic.component';
import { QuizzComponent } from './pages/quizz/quizz.component';
import { DatePipe } from '@angular/common';
import { RankingComponent } from './pages/ranking/ranking.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SidebarComponent,
    HomeComponent,
    FooterComponent,
    NewTestComponent,
    ChartsComponent,
    AllUsersComponent,
    CreateUserComponent,
    QuestionManagementComponent,
    LoginComponent,
    CreateUpdateQuizzComponent,
    CreateUpdateTopicComponent,
    QuizzComponent,
    HistoryComponent,
    RankingComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
  ],
  providers: [
    DatePipe,
    { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
  ],
  bootstrap: [AppComponent],
})
export class AppModule {}
