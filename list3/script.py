import selenium.webdriver
driver = selenium.webdriver.Firefox()
driver.get("http://www.mikolaj.ovh")
driver.add_cookie({'name':'key', 'value':'value', 'path':'/'})
for cookie in driver.get_cookies():
    print ((cookie['name'], cookie['value']))
