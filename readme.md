## Parking Slots

Parking Slots is a project made in coordination with the IT services at California State University San Marcos in order to monitor how many parking slots are available on each of the campus parking.

Example parking object:

```
{
    "id": 1,
    "name": "B",
    "max_slots": 300,
    "created_at": "2017-06-12 18:10:35",
    "updated_at": "2017-06-12 18:10:35",
    "deleted_at": null,
    "free_percent": 12,
    "coordinates": [
        {
            "parking_id": 1,
            "latitude": "33.127053",
            "longitude": "-117.163980"
        },
        {
            "parking_id": 1,
            "latitude": "33.127080",
            "longitude": "-117.163070"
        },
        {
            "parking_id": 1,
            "latitude": "33.127172",
            "longitude": "-117.162240"
        },
        {
            "parking_id": 1,
            "latitude": "33.126336",
            "longitude": "-117.162200"
        },
        {
            "parking_id": 1,
            "latitude": "33.126347",
            "longitude": "-117.163994"
        }
    ],
    "free_slots": {
        "id": 3,
        "parking_id": 1,
        "free_slots": 38,
        "created_at": "2017-06-26 16:45:23",
        "updated_at": "2017-06-26 16:46:14"
    },
    "slots_history": [
        {
            "id": 1,
            "parking_id": 1,
            "free_slots": 42,
            "created_at": "2017-06-12 09:30:00",
            "updated_at": "2017-06-12 09:30:00"
        },
        {
            "id": 2,
            "parking_id": 1,
            "free_slots": 27,
            "created_at": "2017-06-12 10:25:00",
            "updated_at": "2017-06-12 10:25:00"
        },
        {
            "id": 3,
            "parking_id": 1,
            "free_slots": 38,
            "created_at": "2017-06-26 16:45:23",
            "updated_at": "2017-06-26 16:46:14"
        }
    ]
}
```
