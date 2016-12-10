# ----------------------------------[~/api/v1/]---------------------------------


# Name: 
    LOGIN
   
# Method: 
    POST

# Body:

 - scope = scope_login
  
 - gmail = <...>@gmail.com
 
# Example responses:

**`SUCCESS`**

```json
{
  "success": 2,
  "message": "Username Successfully Logged In !",
  "id": "1",
  "tools": [
    {
      "tool_id": "1",
      "tool_name": "tool_one",
      "unlocked": "1",
      "units": "0",
      "daily_units": 50,
      "updated_date": "2016-12-02 13:01:42"
    }
  ]
}
```


# ------------------------------------------------------------------------------- 


# Name: 
    BUY
   
# Method:
    POST
   
# Body

 - scope = scope_buy

 - gmail = <...>@gmail.com

 - tool_id = <#> 
 
# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "You have successfully unlocked this item!"
}
```


# ------------------------------------------------------------------------------- 


# Name: 
    POINTS
   
# Method: 
    POST
    
# Body

 - scope = scope_points

 - gmail = <...>@gmail.com

 - tool_id = <#>

# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "You have successfully used these points!",
  "units": "0"
}
```
 
 **`ERROR`**
 
 ```json
{
  "success": 0,
  "message": "You don't have enough points !"
}
```

 
# ------------------------------------------------------------------------------- 
 
 
# Name: 
    INFO
   
# Method: 
    POST
    
# Body

 - scope = scope_info

# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "Successfully fetched data!",
  "tools": [
    {
      "tool_id": "1",
      "tool_name": "tool_one",
      "tool_updated_on": "2016-12-03 15:12:23",
      "tool_available": "1",
      "tool_index": "1300"
    }
  ]
}
```
