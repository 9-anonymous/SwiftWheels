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
      const rolesCounts: { [key: string]: number } = {}; // Annotation de type pour rolesCounts
  
      clients.forEach(client => {
        const roles = client.roles;
        rolesCounts[roles] = (rolesCounts[roles] || 0) + 1;
      });
  
      const labels = Object.keys(rolesCounts); // Array des étiquettes (noms de roles)
      const values = Object.values(rolesCounts); // Array des valeurs (nombre de clients par roles)
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
      const myChart = new Chart("piechart", {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'number of customers per roles',
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
      const usernameCounts: { [key: string]: number } = {};
  
      clients.forEach(client => {
        const username = client.username;
        usernameCounts[username] = (usernameCounts[username] || 0) + 1;
      });
  
      const labels = Object.keys(usernameCounts);
      const values = Object.values(usernameCounts);
      const colors = labels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));
  
      const myChart = new Chart("line", {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'number of customers by username',
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
        const mark = car.mark;
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
      const priceCounts: { [key: string]: number } = {};
  
      cars.forEach(car => {
        const price = car.price;
        priceCounts[price] = (priceCounts[price] || 0) + 1;
      });
  
      const labels = Object.keys(priceCounts);
      const values = Object.values(priceCounts);
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
