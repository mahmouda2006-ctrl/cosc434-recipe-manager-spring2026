1- Mahmoud Awali

2- Advanced Web Programming  / lab session 6

3- in this lab we implement  a middleware for login/logout, so that the user that is not loged in shouldn’t be able to access the create or update or delete , but the logedin users can 

4-
-for the single protected route i try to access /recipes/create , 
  while logged out it redirected with error message
  while logged in can access the create recipe page
-for protected group (`create`, `store`, `edit`, `update`, `delete`)
  when attempting to access them while logged out, all were properly blocked
  When Accessing them after demo login ,all were accessible
  Confirming public routes (`index`, `show`) remained accessible to everyone
