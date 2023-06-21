import { Component, OnInit, inject } from '@angular/core';
import { UsersServices } from './services/Users.services';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{

  userServices = inject(UsersServices)

  ngOnInit(): void {
    this.userServices.getUsersList().subscribe(e=>{
      console.log(e);
    })
  }
  title = 'angular';
}
