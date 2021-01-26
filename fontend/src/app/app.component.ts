import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'quizz-world';

  isHideAll = false;

  constructor() {
    var currentPath = window.location.href.replace(window.location.origin, "");
    this.isHideAll = currentPath === '/login'
  }
}
