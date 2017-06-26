define({ "api": [
  {
    "type": "get",
    "url": "/parkings",
    "title": "List all parkings",
    "name": "index",
    "group": "Parkings",
    "description": "<p>Get the list of all parkings with their coordinates and the count of free slots.</p>",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ParkingController.php",
    "groupTitle": "Parkings"
  },
  {
    "type": "post",
    "url": "/parkings/:parking/parked",
    "title": "Register as parked",
    "name": "parked",
    "group": "Parkings",
    "description": "<p>Removes one free slot from the specified parking and return the number of free slots.</p>",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ParkingController.php",
    "groupTitle": "Parkings"
  },
  {
    "type": "get",
    "url": "/parkings/:parking",
    "title": "Show one parking",
    "name": "show",
    "group": "Parkings",
    "description": "<p>Get the information of one parking with the history of the free slots.</p>",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ParkingController.php",
    "groupTitle": "Parkings"
  },
  {
    "type": "delete",
    "url": "/parkings/:parking/parked",
    "title": "Unregister as parked",
    "name": "unparked",
    "group": "Parkings",
    "description": "<p>Adds one free slot from the specified parking and return the number of free slots.</p>",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ParkingController.php",
    "groupTitle": "Parkings"
  }
] });
