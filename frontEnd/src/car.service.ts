import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CarService {
  private apiUrl = 'http://localhost:8000/car/new'; // Adjust according to your backend URL

  constructor(private http: HttpClient) { }

  addCar(formData: FormData): Observable<any> {
    console.log(formData.getAll);
    formData.forEach((value, key) => {
      console.log("key %s: value %s", key, value);
  });
  console.log(formData.get("mark"));
  console.log("Pictures:", formData.getAll("pictures[]"));


      
    return this.http.post<any>(this.apiUrl, formData);
  }
}
