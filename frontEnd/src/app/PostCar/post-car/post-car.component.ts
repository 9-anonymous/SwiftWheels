import { Component } from '@angular/core';
import { CarService } from 'src/car.service';
@Component({
  selector: 'app-post-car',
  templateUrl: './post-car.component.html',
  styleUrls: ['./post-car.component.css']
})
export class PostCarComponent {
  Pictures: File | null = null;
  mark: string = '';
  model: string = '';
  price: number =  0;
  abs: boolean = false;
  epc: boolean = false;
  grayCard: boolean = false;
  autoGearBox: boolean = false;
  taxes: boolean = false;
  insurance: boolean = false;
  color: string = '';
  mileage: number =  0;
  quantity: number =  0;
  description: string = '';

  constructor(private carService: CarService) { }

  onFileSelected(event: any): void {
    if (event.target.files.length >  0) {
      this.Pictures = event.target.files[0];
    }
  }

  onSubmit(): void {
    const formData = new FormData();

    if (this.Pictures) {
      formData.append('Pictures', this.Pictures, this.Pictures.name);
    }

    formData.append('mark', this.mark);
    formData.append('model', this.model);
    formData.append('price', this.price.toString());
    formData.append('abs', this.abs.toString());
    formData.append('epc', this.epc.toString());
    formData.append('grayCard', this.grayCard.toString());
    formData.append('autoGearBox', this.autoGearBox.toString());
    formData.append('taxes', this.taxes.toString());
    formData.append('insurance', this.insurance.toString());
    formData.append('color', this.color);
    formData.append('mileage', this.mileage.toString());
    formData.append('quantity', this.quantity.toString());
    formData.append('description', this.description);

    const currentDate = new Date();
    formData.append('AddDate', currentDate.toISOString());

    this.carService.addCar(formData).subscribe(() => {
      console.log('Car added successfully');
      this.resetForm();
    }, error => {
      console.error('Error adding car:', error);
    });
  }

  resetForm(): void {
    this.Pictures = null;
    this.mark = '';
    this.model = '';
    this.price =  0;
    this.abs = false;
    this.epc = false;
    this.grayCard = false;
    this.autoGearBox = false;
    this.taxes = false;
    this.insurance = false;
    this.color = '';
    this.mileage =  0;
    this.quantity =  0;
    this.description = '';
  }
}
