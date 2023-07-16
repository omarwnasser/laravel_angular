import { Component, OnInit, inject } from '@angular/core';
import { UsersServices } from './services/Users.services';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{

  title = 'angular';
  ngOnInit(): void {
  
  }

  showNavbar = false;

}
