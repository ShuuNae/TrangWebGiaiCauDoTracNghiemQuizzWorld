import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { HistoryComponent } from './pages/history/history.component';
import { NewTestComponent } from './pages/new-test/new-test.component';
import { ChartsComponent } from './pages/charts/charts.component';
import { QuestionManagementComponent } from './pages/question-management/question-management.component';
import { CreateUserComponent } from './pages/create-user/create-user.component';
import { AllUsersComponent } from './pages/all-users/all-users.component';
import { LoginComponent } from './pages/login/login.component';

const routes: Routes = [
  { path: 'trang-chu', component: HomeComponent },
  { path: '', component: HomeComponent },
  { path: 'lich-su', component: HistoryComponent },
  { path: 'bai-thi-moi', component: NewTestComponent },
  { path: 'bang-xep-hang', component: ChartsComponent },
  { path: 'danh-sach-nguoi-dung', component: AllUsersComponent },
  { path: 'tao-nguoi-dung', component: CreateUserComponent },
  { path: 'quan-ly-cau-hoi', component: QuestionManagementComponent },
  { path: 'login', component: LoginComponent },
];

@NgModule({
  declarations: [],
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
