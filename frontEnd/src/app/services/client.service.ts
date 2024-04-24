import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClientService {

  private apiUrl = 'http://localhost:8000/api/users'; 

  constructor(private http: HttpClient) { }

  getClients(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  deleteClient(id: number) {
    const url = `${this.apiUrl}/${id}`;
    return this.http.delete(url);
  }

  countClients(): Observable<number> {
    const countUrl = `${this.apiUrl}/count`;
    return this.http.get<number>(countUrl);
  }
  
  
}
