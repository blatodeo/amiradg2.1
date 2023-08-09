import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  public appPages = [
    
    { title: 'Recetas', url: '/home', icon: 'pizza' },
    { title: 'Productos', url: '/customers', icon: 'nutrition' },
  ];
  constructor() {}
}
