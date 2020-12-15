import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

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
import { CreateUserComponent } from './pages/create-user/create-user.component';
import { QuestionManagementComponent } from './pages/question-management/question-management.component';

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
    QuestionManagementComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
