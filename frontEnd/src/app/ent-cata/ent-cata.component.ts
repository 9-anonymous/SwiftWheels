import { Component } from '@angular/core';
import { SearchService } from 'src/search.service';

@Component({
  selector: 'app-ent-cata',
  templateUrl: './ent-cata.component.html',
  styleUrls: ['./ent-cata.component.css']
})
export class EntCataComponent {
  searchResults: any[] = [];
  selectedCar: any;
  selectedImage: string = '';


  constructor(private searchService: SearchService) { }

  ngOnInit(): void {
    this.fetchAllCars();
  }  

  selectCar(car: any) {
    this.selectedCar = car;
    // Set selectedImage to the URL of the first image of the selected car
    if (car.pictures) {
      const pictureArray = car.pictures.split(',');
      if (pictureArray.length > 0) {
        this.selectedImage = `http://localhost:8000/uploads/${pictureArray[0]}`;
      }
    }
  }

  fetchAllCars() {
    this.searchService.getAllCars().subscribe(
      (cars: any[]) => {
        this.searchResults = cars.filter(car => car.mark.toLowerCase().includes('bmw'));
        // Initialize selectedImage for each car
        this.searchResults.forEach(car => {
          if (car.pictures) {
            const pictureArray = car.pictures.split(',');
            if (pictureArray.length > 0) {
              car.selectedImage = this.getPicture(car.pictures, 0);
            }
          }
        });
      },
      (error: any) => {
        console.error('Error fetching all cars:', error);
      }
    );
  }
  
  getPicture(pictures: string, index: number): string {
    if (pictures) {
      const pictureArray = pictures.split(',');
      const picture = pictureArray[index];
      return `http://localhost:8000/uploads/${picture}`;
    } else {
      return '';
    }
  }

  selectImage(car: any, index: number): void {
    // Update the selectedImage property of the clicked car
    car.selectedImage = this.getPicture(car.pictures, index);
  }

}
