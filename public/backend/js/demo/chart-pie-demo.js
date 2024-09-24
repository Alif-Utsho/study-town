// Step 1: Group applications by course
let pie_applications = window.applications;
let courses = window.courses;

// Create a set of course names for quick lookup
let courseNames = new Set(courses.map(course => course.name));
let courseCounts = {};
let othersCount = 0;

// Count applications for each course
pie_applications.forEach(app => {
  if (courseNames.has(app.course)) {
    // If the course is in the courses variable, count it
    if (courseCounts[app.course]) {
      courseCounts[app.course]++;
    } else {
      courseCounts[app.course] = 1;
    }
  } else {
    // If the course is not in the courses variable, add to Others
    othersCount++;
  }
});

// Step 2: Prepare labels and data for the chart
let groupedCourses = { ...courseCounts }; // Copy course counts
if (othersCount > 0) {
  groupedCourses["Others"] = othersCount; // Add Others count if applicable
}

let courseLabels = Object.keys(groupedCourses);
let courseData = Object.values(groupedCourses);

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito, -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Now you can use courseLabels and courseData to create your chart


// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: courseLabels,  // Updated with course names
    datasets: [{
      data: courseData,  // Updated with counts of each course
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'], // Add more colors if needed
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619', '#e02d1b', '#6e707e'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'bottom',  // This moves the legend below the chart
      labels: {
        boxWidth: 20,      // Adjust the size of the legend box
        padding: 15,       // Padding between legend items
        fontColor: '#858796'  // Set font color to match your styling
      }
    },
    cutoutPercentage: 80,
  },
});
