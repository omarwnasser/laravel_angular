import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({providedIn: 'root'})
export class UsersServices {
    constructor(private httpClient: HttpClient) { }

    getUsersList = ()=>{
       return this.httpClient.get('user')
    }
    
}