import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class VoitureService {
  private apiUrl = 'http://localhost:8000/api/cars'; // Remplacez cette URL par l'URL de votre API Symfony

  constructor(private http: HttpClient) { }

  getCars(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  deleteCars(id: number) {
    const url = `${this.apiUrl}/${id}`;
    return this.http.delete(url);
  }

  countCars(): Observable<number> {
    const countUrl = `${this.apiUrl}/count`;
    return this.http.get<number>(countUrl);
  }

  
}
