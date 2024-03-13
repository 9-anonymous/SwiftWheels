// shared.service.ts

import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
 providedIn: 'root',
})
export class SharedService {
 private userTypeSource = new BehaviorSubject<string>('');
 currentUserType = this.userTypeSource.asObservable();

 constructor() {}

 changeUserType(userType: string) {
    this.userTypeSource.next(userType);
 }
}
