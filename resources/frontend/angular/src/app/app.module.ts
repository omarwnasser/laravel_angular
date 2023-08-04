import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ApiInterceptor } from './services/ApiInterceptor.services';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import {UsersServices} from './services/Users.services';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
  ],
  providers: [
    UsersServices,
    { provide: HTTP_INTERCEPTORS, useClass: ApiInterceptor, multi: true },
    {provide: "BASE_API_URL" , useValue: process.env['NODE_ENV'] == 'production' ? window.location.host :'http://localhost:8000'},
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
