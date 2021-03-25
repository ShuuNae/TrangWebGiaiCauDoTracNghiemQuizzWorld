import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { HistoryComponent } from './pages/history/history.component';
import { NewTestComponent } from './pages/new-test/new-test.component';
import { ChartsComponent } from './pages/charts/charts.component';
import { QuestionManagementComponent } from './pages/question-management/question-management.component';
import { CreateUserComponent } from './pages/create-update-user/create-update-user.component';
import { AllUsersComponent } from './pages/all-users/all-users.component';
import { LoginComponent } from './pages/login/login.component';
import { AuthGuard } from './_helpers/auth.guard';
import { CreateUpdateTopicComponent } from './pages/create-update-topic/create-update-topic.component';
import { CreateUpdateQuizzComponent } from './pages/create-update-quizz/create-update-quizz.component';
import { QuizzComponent } from './pages/quizz/quizz.component';
import { RankingComponent } from './pages/ranking/ranking.component';

const routes: Routes = [
  { path: 'trang-chu', component: HomeComponent, canActivate: [AuthGuard] },
  { path: '', pathMatch: 'full', redirectTo: 'trang-chu' },
  { path: 'lich-su', component: HistoryComponent, canActivate: [AuthGuard] },
  {
    path: 'bai-thi-moi',
    component: NewTestComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'bang-xep-hang',
    component: ChartsComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'danh-sach-nguoi-dung',
    component: AllUsersComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'tao-nguoi-dung',
    component: CreateUserComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'sua-nguoi-dung/:id',
    component: CreateUserComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'quan-ly-cau-hoi',
    component: QuestionManagementComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'them-chu-de',
    component: CreateUpdateTopicComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'sua-chu-de/:id',
    component: CreateUpdateTopicComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'them-cau-hoi',
    component: CreateUpdateQuizzComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'sua-cau-hoi/:id',
    component: CreateUpdateQuizzComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'trac-nghiem-nhanh/:id',
    component: QuizzComponent,
    canActivate: [AuthGuard],
  },
  {
    path: 'xep-hang',
    component: RankingComponent,
    canActivate: [AuthGuard],
  },
  { path: 'dang-nhap', component: LoginComponent },
];

@NgModule({
  declarations: [],
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
