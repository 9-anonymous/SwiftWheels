import { Component, OnInit } from '@angular/core';
import { Chart, registerables } from 'chart.js';
import { ClientService } from '../services/client.service';
import { VoitureService } from '../services/voiture.service';
Chart.register(...registerables);

@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.component.html',
  styleUrls: ['./accueil.component.css']
})
export class AccueilComponent implements OnInit {
  clientCount!: number;
  carsCount!: number;
constructor(private clientservice:ClientService,private voitureservice:VoitureService){}
  ngOnInit(): void {
    this.clientChart();
    this.clientChart2();
    this.carChart();
    this.carChart2();
    this.getClientCount();
    this.getCarsCount();
  }

  clientChart(): void {
    this.clientservice.getClients().subscribe((clients: any[]) => {
      const cityCounts: { [key: string]: number } = {}; // Annotation de type pour cityCounts
  
      clients.forEach(client => {
        const city = client.Ville;
        cityCounts[city] = (cityCounts[city] || 0) + 1;
      });
  
      const labels = Object.keys(cityCounts); // Array des étiquettes (noms de ville)
      const values = Object.values(cityCounts); // Array des valeurs (nombre de clients par ville)
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
      const myChart = new Chart("piechart", {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'number of customers per city',
            data: values,
            backgroundColor: colors, 
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  }



  clientChart2() {
    this.clientservice.getClients().subscribe((clients: any[]) => {
      const lastNameCounts: { [key: string]: number } = {};
  
      clients.forEach(client => {
        const lastName = client.lastname;
        lastNameCounts[lastName] = (lastNameCounts[lastName] || 0) + 1;
      });
  
      const labels = Object.keys(lastNameCounts);
      const values = Object.values(lastNameCounts);
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
  
      const myChart = new Chart("line", {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'number of customers by lastname',
            data: values,
            backgroundColor: colors,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  }


  carChart() {
    this.voitureservice.getCars().subscribe((cars: any[]) => {
      const markCounts: { [key: string]: number } = {};
  
      cars.forEach(car => {
        const mark = car.Mark;
        markCounts[mark] = (markCounts[mark] || 0) + 1;
      });
  
      const labels = Object.keys(markCounts);
      const values = Object.values(markCounts);
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
  
      const myChart = new Chart("daughnut1", {
        type: 'polarArea',
        data: {
          labels: labels,
          datasets: [{
            label: 'Nombre de voitures par marque',
            data: values,
            backgroundColor: colors,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  }

  carChart2() {
    this.voitureservice.getCars().subscribe((cars: any[]) => {
      const markCounts: { [key: string]: number } = {};
  
      cars.forEach(car => {
        const mark = car.Mark;
        markCounts[mark] = (markCounts[mark] || 0) + 1;
      });
  
      const labels = Object.keys(markCounts);
      const values = Object.values(markCounts);
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
  
      const myChart = new Chart("daughnut", {
        type: 'polarArea',
        data: {
          labels: labels,
          datasets: [{
            label: 'Nombre de voitures par marque',
            data: values,
            backgroundColor: colors,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  }



getClientCount() {
  this.clientservice.countClients().subscribe(
    count => {
      this.clientCount = count;
    },
    error => {
      console.log('Une erreur s\'est produite lors de la récupération du nombre de clients :', error);
    }
  );
}

getCarsCount() {
  this.voitureservice.countCars().subscribe(
    count => {
      this.carsCount = count;
    },
    error => {
      console.log('Une erreur s\'est produite lors de la récupération du nombre de cars :', error);
    }
  );
}

  
}
