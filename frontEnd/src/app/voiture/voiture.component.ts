import { Component, OnInit } from '@angular/core';
import { VoitureService } from '../services/voiture.service';

@Component({
  selector: 'app-voiture',
  templateUrl: './voiture.component.html',
  styleUrls: ['./voiture.component.css']
})
export class VoitureComponent implements OnInit {
  cars: any[] = [];
  searchTerm: string = '';
  filteredCars: any[] = [];

  constructor(private VoitureService:VoitureService){}
  

  ngOnInit(): void {
    this.getCars();
    
  }

  getCars():void{
    this.VoitureService.getCars().subscribe(
      response=>{
        this.cars=response;
        this.filteredCars = response;
      },
      err=>{
        console.log(err);
      }
    );
  };

  deletetCars(id:number):void{
    this.VoitureService.deleteCars(id).subscribe(
      ()=>{
        console.log('Cars deleted successfully');
        this.getCars();
      },
      err=>{
        console.log("Err", err);
      }
    )
  }

  search(): void {
    if (!this.searchTerm) {
      this.filteredCars = [...this.cars]; // Reset the filtered list if the search term is empty
    } else {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      this.filteredCars = this.cars.filter(car => {
        const lowerCaseCarName = car.CarName?.toLowerCase() || '';
        const lowerCaseMark = car.Mark?.toLowerCase() || '';
        return lowerCaseCarName.includes(lowerCaseSearchTerm) || lowerCaseMark.includes(lowerCaseSearchTerm);
      });
    }
  }
  
}
