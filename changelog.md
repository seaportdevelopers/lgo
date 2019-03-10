2019-03-09
21. Route type in string (not ID) //FIXED
22. Status change
23. Route edit view
24. route.create
	24.1 Route can't be confirmed if it's selected truck, cargo, driver is in another route which is in the same time period of currently selected route.
	24.2 Add timeBegin, timeEnd to routes migration and add these fields to main routes table and create views
	24.3 Add type selectbox in routes.create
	24.3 Research, why it's needed to push creat button two and more times
25. Routes.show
	25.1 Pagination
	25.2 Filtering by select box in the table card header
26. repairs.create
	26.1 Let user enter service provider by him/her self. //CHANGE DISCARDED
	26.2 Add euro sign to price //CHANGE COMPLETED
27. drivers.show
	27.1 get status from his/her current route
	27.2 assign cuurent truck, cargo and route by his/her current route
28. drivers.create
29. insurance.create
	29.1 select transport from selectbox
	29.2 experation date (chnge input type to date)
	29.3 fix input grid
	29.4 make safety check (expiration date can't be lower than now())
30. insurance.edit
31. transport.create
 31.1 safety check (if category is any type of CARGO than idno must be in following format: [XX111])
 31.2 make brands migration [id, brandName]
32. transport.show
	32.1 status change
<--->	FRONT-END ISSUES	</--->
33. Side navigation
	33.1 Hover isn' working properly and it's not stable //FIXED, but U.N.S.T.A.B.L.E
	33.2 Change background into white and colorize the items //DONE
	33.3 When extended - don't move the content //DONE
	33.4 Make it responsive
		33.4.1 When menu icon clicked show fullscreen navigation with labels
		33.4.1 When search icon clicked redirect to search page
34. SEARCH page
35. Top navigation
 35.1 Add user icon near username and add href to user edit //DONE

2019-02-21
1. Extended side navigation on hover //DONE
2. Changed background color of side navigation //DONE
3. Fix button and input hovers //DONE
4. Hide description from main table //DONE
5. Make status popover (bootstrap) -- Liudas
6. Change repair table buttons to table buttons //DONE
7. Make delete function with sweetalert //DONE
8. Make table filter //DONE
9. Remove close button from edit forms (except for modals) //DONE
10. add VIN, technical review expiration date to trucks and cargos migrations //DONE
11. add serfiticate_type, serfiticate_expiration_date to cargos //						----------CURRENTLY WORKING ON----------
12. Show serfiticate and serfiticate_expiration fields only when cargo selected //DONE
13. INSURANCE //DONE
	13.1 Make incurence migration [id, name, idnoid, serial, green_serial, from date, expires] //DONE
	13.2 Make insurance views (show, edit, delete) //DONE
14. CLIENTS
	14.1 Make clients migration [id, name, phone, email, website, dealer, description]
	14.2 Make client views (show, edit, delete)
15. SERVICES
	15.1 migration [id, name, phone, email, website, paid, support] //DONE
	15.2 views
16. pagination //DONE
17. Fix side navigation hover on desktops
18. Leave side navigation hover on tablets and mobile devices
19. Add icons to buttons
20. DRIVERS
