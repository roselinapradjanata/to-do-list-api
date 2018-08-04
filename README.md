# To-Do List API
API for creating and managing to do list developed with Laravel and PostgreSQL

## Features
### Authentication
Before using the API, you have to generate the `Authorization` token to be used in the header.
#### Register
First, you have to register yourself by sending a POST request with your `username` and `password`.
```http
POST /api/register
Host: localhost:8080
Content-Type: application/json
Accept: application/json

{
  "username": "cat",
  "password": "cat"
}
```
The response will be a JSON containing `token` and `username`.
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU2OTM5NGQyM2RmNTA0NzNjYzc3ZTBhYzE5NjUwMWUyZjU1MjYzODU0OGRlN2FhMjU2MDI1ODEwZTA1M2Q0Zjk5MmU1ODM2YWMwYWFjMWQxIn0.eyJhdWQiOiIxIiwianRpIjoiZTY5Mzk0ZDIzZGY1MDQ3M2NjNzdlMGFjMTk2NTAxZTJmNTUyNjM4NTQ4ZGU3YWEyNTYwMjU4MTBlMDUzZDRmOTkyZTU4MzZhYzBhYWMxZDEiLCJpYXQiOjE1MzMzNTEyMjMsIm5iZiI6MTUzMzM1MTIyMywiZXhwIjoxNTY0ODg3MjIzLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.V15K13GbTYJsNzzIXtEiowWAnnX3jubIAIBNkbIj4YgcG-m1EjS2mpUO9zbvYtKa4-szi4K-IXBrErANFIopRDF2EEf_eI-Kzv4rr-S7abK64lPKNaniyPVChsdJNibM2Sk_wJYWwPiV0sPwtqjOk0zO84AIf2GA-8opi_TynTi8F_tO9eTmG299s2ws7HXVOMm4SrZx5Je65bBCGdvWjClqr8HDAfDAwVen4EBg54seNp5tl521pMJp_skXknB5Gy02yRO7MIiRVxjOE-j5BDNC-gm5dMkVFm56OC-DJ339fKPo6JmJwqh_PA44H4-2lRr8X2tIVa36Iij9YE1yF74jQvPkYmGD4qiIF3Th_6XnPmIzgc5u6gSK2hLbA54N2eki-MIyS_hQxO7T9xSgUu6gMdf1yT3yCAFfvSPJr8cLvm9qjOlLhh-pbkF06fIKTt8T1zDNuU7Qmf3VXZ3d0movXoSLBzipaj7NssHmcn_DPdd0-SVaDU9blyrgP2_Nlk__wiwlMOZxFjzcuMi76cClSU4G3Vga5apZsZJyAY_HiXTdiKwc0sg0NVKQ3Y9yoUhdUavmoBiyAbOkemG4k-5ryPN-wXGLHPTy-H2hteW4bH8D_mBTNJwulcMcRr6yQWdF99Qtg9FHR-oS7br8NP87CRnAOQLecf2mPraXb8Q",
  "username": "cat"
}
```

#### Login
You can use the token immediately after register, but if sometimes you want to use the API again, you have to login to get the new authorization token.
```http
POST /api/login
Host: localhost:8080
Content-Type: application/json
Accept: application/json

{
  "username": "cat",
  "password": "cat"
}
```
The response will be a JSON containing the new generated `token`.
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ"
}
```

#### User Details
This endpoint gives you user details including your id, username, register date, and modify date. From this feature until the last, you have to put the authorization token in the header.
```http
GET /api/details
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
The response will be a JSON containing your user details.
```json
{
  "id": 9,
  "username": "cat",
  "created_at": "2018-08-04 09:53:43",
  "updated_at": "2018-08-04 09:53:43"
}
```
### To-Do List Management
To access the management features, you have to put `Authorization` header for every request. The token for authorization can be acquired after you logged in to the API.
#### Create To-Do
To create a to-do, simply send a `POST` request containing these parameters. You can also add the `completed` parameter, if you want to add an already completed to-do. If you don't provide it, the default value will be `false`.
```http
POST /api/todos
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json

{
  "name": "Chasing garden mouse",
  "priority": 2,
  "location": "House",
  "timestart": "2018-08-08 08:08:08",
  "completed": false
}
```

#### Retrieve All To-Dos
Send a `GET` request to see all your to-do list.
```http
GET /api/todos
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
The response will be a JSON array containing all your to-dos.
```json
[
  {
    "id": 10,
    "name": "Chasing garden mouse",
    "priority": 2,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  },
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  },
  {
    "id": 12,
    "name": "Fighting the neighbor's dog",
    "priority": 3,
    "location": "Street",
    "timestart": "2018-09-09 09:09:09",
    "completed": false
  }
]
```

#### Retrieve Single To-Do
You can retrieve a single to-do if you know its `id`.
```http
POST /api/todos
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json

{
  "name": "Chasing garden mouse",
  "priority": 2,
  "location": "House",
  "timestart": "2018-08-018 08:08:08",
  "completed": false
}
```

#### Retrieve All To-Dos
Send a `GET` request to see all your to-do list.
```http
GET /api/todos/10
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
The response will be a JSON containing the to-do with id 10.
```json
{
  "id": 10,
  "name": "Chasing garden mouse",
  "priority": 2,
  "location": "House",
  "timestart": "2018-08-08 08:08:08",
  "completed": false
}
```

#### Edit To-Do
If you want to change attributes on your to-do, you can send a `PUT` request containing the same parameters with `id`.
```http
PUT /api/todos/10
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json

{
  "name": "Chasing garden mouse",
  "priority": 2,
  "location": "Garden",
  "timestart": "2018-10-10 10:10:10",
  "completed": false
}
```

#### Update Completed Status
If you have finished the completed the to-do, you can mark it as completed by sending a `PATCH` request with the to-do's `id`. You can also turn the completed status back to `false` if you accidentally marked it as complete by sending the same exact request.
```http
PATCH /api/todos/10
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```

### To-Do List Sorting and Filtering
#### Sorting by a Single Key
If you want to sort the to-dos by `priority` ascending, you can do it like this.
```http
GET /api/todos?sort=priority
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
The result will be like this.
```json
[
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  },
  {
    "id": 10,
    "name": "Chasing garden mouse",
    "priority": 2,
    "location": "Garden",
    "timestart": "2018-10-10 10:10:10",
    "completed": true
  },
  {
    "id": 12,
    "name": "Fighting the neighbor's dog",
    "priority": 3,
    "location": "Street",
    "timestart": "2018-09-09 09:09:09",
    "completed": false
  }
]
```

#### Sorting by Multiple Keys
You can also sort by multiple keys as much as you want.
```http
GET /api/todos?sort=priority,location
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
And this is the JSON response.
```json
[
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  },
  {
    "id": 10,
    "name": "Chasing garden mouse",
    "priority": 2,
    "location": "Garden",
    "timestart": "2018-10-10 10:10:10",
    "completed": true
  },
  {
    "id": 12,
    "name": "Fighting the neighbor's dog",
    "priority": 3,
    "location": "Street",
    "timestart": "2018-09-09 09:09:09",
    "completed": false
  }
]
```

#### Sorting in Descending Order
You want to sort by the lowest priority first? No problem. Just specify it on the request. By default, the order will be ascending if you don't put it in the URL.
```http
GET /api/todos?sort=priority:desc,location:asc,name
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
Here's the result.
```json
[
  {
    "id": 12,
    "name": "Fighting the neighbor's dog",
    "priority": 3,
    "location": "Street",
    "timestart": "2018-09-09 09:09:09",
    "completed": false
  },
  {
    "id": 10,
    "name": "Chasing garden mouse",
    "priority": 2,
    "location": "Garden",
    "timestart": "2018-10-10 10:10:10",
    "completed": true
  },
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  }
]
```

#### Filtering by a Single Key
This is the example if you want to see the to-dos that have been completed.
```http
GET /api/todos?completed=true
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
This is the JSON response
```json
[
  {
    "id": 10,
    "name": "Chasing garden mouse",
    "priority": 2,
    "location": "Garden",
    "timestart": "2018-10-10 10:10:10",
    "completed": true
  }
]
```

#### Filtering by Multiple Keys
You can also filter by multiple keys as much as you want. Here's the example filtering by `completed` and `location`.
```http
GET /api/todos?completed=false&location=House
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
Below is the response.
```json
[
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  }
]
```

#### Combine Sorting and Filtering
The sorting and filtering method work independently, so you can combine them by using `&` on the request.
```http
GET /api/todos?sort=id&completed=false
Host: localhost:8080
Content-Type: application/json
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlYmFiNTc3OGZiOTAzZjFjNmUyYTM1ODY4NDdlOTg0Y2RmMWNhYTE3MTU5ODQ2ZTg0ZTk0NTYzNTBlODZhNThjZDM2NjEzZGFjYTZlNmQzIn0.eyJhdWQiOiIxIiwianRpIjoiMGViYWI1Nzc4ZmI5MDNmMWM2ZTJhMzU4Njg0N2U5ODRjZGYxY2FhMTcxNTk4NDZlODRlOTQ1NjM1MGU4NmE1OGNkMzY2MTNkYWNhNmU2ZDMiLCJpYXQiOjE1MzMzNTE1NDAsIm5iZiI6MTUzMzM1MTU0MCwiZXhwIjoxNTY0ODg3NTQwLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.ItWhkVGRlN_fZFvs9nT6oAMwbS1uW5Xrf2xzCOYFQ5Jg7Ibwho6Dn4LnW6BIBUzhWIa9VGuWGnEF5gwvv5zATqM2BD-w1QvOXmoJ6RunPWqLBBflxCfB9reJSzcDQsxhj8-aPahGLtOZxGIxjVKlGPRUsrXfk5H16Ix3-s8XzFDg9JYgj-j3PNnQukO1z-vVktjkriJfBPEODIW6DT3okENWGMpslCeiPuC_gJjFlwFPjSFTsQfG88wnoyWzqt5CynrClTShX7jaOI3FLqvAtQ5xnbfn48VnK8-PrKnSsMVBgr1TSmiHAp3-6rfyY_tYNVRMMj_6z25R7DG033Jou1A0bc7T1R5OUECHkNLD6xmDdpzJINe7do2k-2DpcC15gljc52q4XdfvHp0evZfG6f9m7qJDp8Heus5tdtIRMxoBRJ9cXhoMp6cF4PgZodIK6Nz7Po6-BZ_LVyXquWtQzj4A51sCbsz_zuTblHsVwmJ0ffvHQQXM6J2PXpMnfiG90Qh7MczQCyyB58cnusCr0fUw_vD4FKCyo97ENeM2Al0m0yDUkQeHfXO0jcsUXMCmnukbFg6jUtR6ahmyhCPbfsh6xxVuwnU02usKxA6plofKoRjaQ0rYj5Lkj3EVIV5E3A879qIwkvtSGIjPzOAVuOBQHT2s6C8OjiYcwNt4JvQ
Accept: application/json
```
This is the query result.
```json
[
  {
    "id": 11,
    "name": "Loving human",
    "priority": 1,
    "location": "House",
    "timestart": "2018-08-08 08:08:08",
    "completed": false
  },
  {
    "id": 12,
    "name": "Fighting the neighbor's dog",
    "priority": 3,
    "location": "Street",
    "timestart": "2018-09-09 09:09:09",
    "completed": false
  }
]
```
## Author
**Roselina Pradjanata**  
Github: [roselinapradjanata](https://github.com/roselinapradjanata)  
LinkedIn: [roselinapradjanata](https://www.linkedin.com/in/roselinapradjanata)  
