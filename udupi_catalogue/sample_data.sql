-- Insert taluks
INSERT INTO taluk (taluk_name) VALUES
('Udupi'),
('Karkala'),
('Hebri'),
('Kundapura'),
('Bramhavara'),
('Byndoor'),
('Kaup');

-- Insert destinations for each taluk
INSERT INTO destinations (taluk_id, name, category, description, image) VALUES
-- Udupi Taluk
(1, 'Malpe Beach', 'Beaches', 'A beautiful beach with golden sands and clear waters.', 'destination-1.jpg'),
(1, 'St. Mary\'s Island', 'Natural Attractions', 'A group of small islands with unique rock formations.', 'destination-5.jpg'),
(1, 'Kapu Beach', 'Beaches', 'A serene beach with a historic lighthouse.', 'destination-6.jpg'),

-- Karkala Taluk
(2, 'Gomateshwara Statue', 'Religious Sites', 'A 42-foot tall monolithic statue of Lord Bahubali.', 'destination-1.jpg'),
(2, 'Karkala Lake', 'Natural Attractions', 'A beautiful lake surrounded by hills.', 'destination-5.jpg'),
(2, 'Chaturmukha Basadi', 'Religious Sites', 'A Jain temple with four identical entrances.', 'destination-6.jpg'),

-- Hebri Taluk
(3, 'Kudlu Falls', 'Natural Attractions', 'A beautiful waterfall in the Western Ghats.', 'destination-1.jpg'),
(3, 'Hebri Temple', 'Religious Sites', 'An ancient temple with unique architecture.', 'destination-5.jpg'),
(3, 'Hebri Lake', 'Natural Attractions', 'A serene lake surrounded by forests.', 'destination-6.jpg'),

-- Kundapura Taluk
(4, 'Maravanthe Beach', 'Beaches', 'A unique beach where the sea and river run parallel.', 'destination-1.jpg'),
(4, 'Kollur Mookambika Temple', 'Religious Sites', 'A famous temple dedicated to Goddess Mookambika.', 'destination-5.jpg'),
(4, 'Kodi Bengre Beach', 'Beaches', 'A pristine beach with golden sands.', 'destination-6.jpg'),

-- Bramhavara Taluk
(5, 'Bramhavara Temple', 'Religious Sites', 'An ancient temple with rich history.', 'destination-1.jpg'),
(5, 'Bramhavara Lake', 'Natural Attractions', 'A beautiful lake with boating facilities.', 'destination-5.jpg'),
(5, 'Bramhavara Beach', 'Beaches', 'A quiet beach perfect for relaxation.', 'destination-6.jpg'),

-- Byndoor Taluk
(6, 'Byndoor Beach', 'Beaches', 'A beautiful beach with golden sands.', 'destination-1.jpg'),
(6, 'Byndoor Temple', 'Religious Sites', 'An ancient temple with unique architecture.', 'destination-5.jpg'),
(6, 'Byndoor Lake', 'Natural Attractions', 'A serene lake surrounded by nature.', 'destination-6.jpg'),

-- Kaup Taluk
(7, 'Kaup Beach', 'Beaches', 'A beautiful beach with a historic lighthouse.', 'destination-1.jpg'),
(7, 'Kaup Temple', 'Religious Sites', 'An ancient temple with rich history.', 'destination-5.jpg'),
(7, 'Kaup Lighthouse', 'Historical Sites', 'A historic lighthouse offering panoramic views.', 'destination-6.jpg');

-- Insert accommodation options
INSERT INTO accommodation (taluk_id, name, type, description, contact, image) VALUES
-- Udupi Taluk
(1, 'Paradise Isle Beach Resort', 'Resort', 'Luxury beachfront resort with all amenities.', '9876543210', 'hotel-resto-5.jpg'),
(1, 'Udupi Heritage Hotel', 'Hotel', 'Heritage hotel with traditional architecture.', '9876543211', 'hotel-resto-6.jpg'),
(1, 'Malpe Beach Resort', 'Resort', 'Beach resort with water sports facilities.', '9876543212', 'hotel-resto-7.jpg'),

-- Karkala Taluk
(2, 'Karkala Heritage Hotel', 'Hotel', 'Traditional hotel with modern amenities.', '9876543213', 'hotel-resto-5.jpg'),
(2, 'Gomateshwara Resort', 'Resort', 'Resort near the famous Gomateshwara statue.', '9876543214', 'hotel-resto-6.jpg'),
(2, 'Karkala Lake View Hotel', 'Hotel', 'Hotel with beautiful lake views.', '9876543215', 'hotel-resto-7.jpg'),

-- Hebri Taluk
(3, 'Hebri Nature Resort', 'Resort', 'Eco-friendly resort in the Western Ghats.', '9876543216', 'hotel-resto-5.jpg'),
(3, 'Hebri Valley Hotel', 'Hotel', 'Hotel with valley views.', '9876543217', 'hotel-resto-6.jpg'),
(3, 'Western Ghats Resort', 'Resort', 'Resort surrounded by nature.', '9876543218', 'hotel-resto-7.jpg'),

-- Kundapura Taluk
(4, 'Kundapura Beach Resort', 'Resort', 'Beachfront resort with water sports.', '9876543219', 'hotel-resto-5.jpg'),
(4, 'Kundapura Heritage Hotel', 'Hotel', 'Traditional hotel with modern amenities.', '9876543220', 'hotel-resto-6.jpg'),
(4, 'Maravanthe Resort', 'Resort', 'Resort with sea and river views.', '9876543221', 'hotel-resto-7.jpg'),

-- Bramhavara Taluk
(5, 'Bramhavara Heritage Hotel', 'Hotel', 'Traditional hotel with cultural experience.', '9876543222', 'hotel-resto-5.jpg'),
(5, 'Bramhavara Lake Resort', 'Resort', 'Resort with lake views and boating.', '9876543223', 'hotel-resto-6.jpg'),
(5, 'Bramhavara Beach Resort', 'Resort', 'Beach resort with water sports.', '9876543224', 'hotel-resto-7.jpg'),

-- Byndoor Taluk
(6, 'Byndoor Beach Resort', 'Resort', 'Beachfront resort with all amenities.', '9876543225', 'hotel-resto-5.jpg'),
(6, 'Byndoor Heritage Hotel', 'Hotel', 'Traditional hotel with modern facilities.', '9876543226', 'hotel-resto-6.jpg'),
(6, 'Byndoor Lake Resort', 'Resort', 'Resort with lake views and activities.', '9876543227', 'hotel-resto-7.jpg'),

-- Kaup Taluk
(7, 'Kaup Beach Resort', 'Resort', 'Beach resort with lighthouse views.', '9876543228', 'hotel-resto-5.jpg'),
(7, 'Kaup Heritage Hotel', 'Hotel', 'Traditional hotel with modern amenities.', '9876543229', 'hotel-resto-6.jpg'),
(7, 'Kaup Lighthouse Resort', 'Resort', 'Resort with panoramic sea views.', '9876543230', 'hotel-resto-7.jpg');

-- Insert local experiences
INSERT INTO local_experiences (taluk_id, name, description, duration, image) VALUES
-- Udupi Taluk
(1, 'Temple Tour', 'Guided tour of famous temples in Udupi.', '4 hours', 'services-1.jpg'),
(1, 'Beach Activities', 'Water sports and beach activities at Malpe.', '3 hours', 'services-2.jpg'),
(1, 'Cooking Class', 'Learn to cook authentic Udupi cuisine.', '2 hours', 'services-3.jpg'),

-- Karkala Taluk
(2, 'Jain Heritage Tour', 'Explore ancient Jain monuments.', '5 hours', 'services-1.jpg'),
(2, 'Nature Walk', 'Guided walk through scenic landscapes.', '3 hours', 'services-2.jpg'),
(2, 'Traditional Art Workshop', 'Learn traditional art forms.', '2 hours', 'services-3.jpg'),

-- Hebri Taluk
(3, 'Western Ghats Trek', 'Guided trek through beautiful trails.', '6 hours', 'services-1.jpg'),
(3, 'Waterfall Visit', 'Visit to beautiful waterfalls.', '4 hours', 'services-2.jpg'),
(3, 'Nature Photography', 'Guided photography tour.', '3 hours', 'services-3.jpg'),

-- Kundapura Taluk
(4, 'Beach Hopping', 'Visit multiple beautiful beaches.', '5 hours', 'services-1.jpg'),
(4, 'Backwater Cruise', 'Boat ride through scenic backwaters.', '3 hours', 'services-2.jpg'),
(4, 'Fishing Experience', 'Experience traditional fishing methods.', '4 hours', 'services-3.jpg'),

-- Bramhavara Taluk
(5, 'Temple Tour', 'Visit ancient temples in Bramhavara.', '4 hours', 'services-1.jpg'),
(5, 'Cultural Show', 'Traditional dance and music performance.', '2 hours', 'services-2.jpg'),
(5, 'Handicraft Workshop', 'Learn traditional handicrafts.', '3 hours', 'services-3.jpg'),

-- Byndoor Taluk
(6, 'Beach Activities', 'Water sports and beach fun.', '4 hours', 'services-1.jpg'),
(6, 'Cultural Tour', 'Explore local culture and traditions.', '3 hours', 'services-2.jpg'),
(6, 'Cooking Class', 'Learn local cuisine preparation.', '2 hours', 'services-3.jpg'),

-- Kaup Taluk
(7, 'Lighthouse Tour', 'Visit historic lighthouse and learn its history.', '3 hours', 'services-1.jpg'),
(7, 'Beach Activities', 'Water sports and beach games.', '4 hours', 'services-2.jpg'),
(7, 'Cultural Experience', 'Traditional dance and music show.', '2 hours', 'services-3.jpg');

-- Insert food options
INSERT INTO food (taluk_id, name, type, description, image) VALUES
-- Udupi Taluk
(1, 'Udupi Masala Dosa', 'Vegetarian', 'Famous crispy dosa with special masala.', 'services-1.jpg'),
(1, 'Goli Baje', 'Snack', 'Deep-fried savory balls, a local favorite.', 'services-2.jpg'),
(1, 'Udupi Sambar', 'Vegetarian', 'Traditional lentil soup with vegetables.', 'services-3.jpg'),

-- Karkala Taluk
(2, 'Karkala Special Thali', 'Vegetarian', 'Traditional meal with multiple dishes.', 'services-1.jpg'),
(2, 'Kadubu', 'Snack', 'Steamed rice cake with coconut.', 'services-2.jpg'),
(2, 'Karkala Special Payasa', 'Dessert', 'Traditional sweet dish.', 'services-3.jpg'),

-- Hebri Taluk
(3, 'Hebri Special Neer Dosa', 'Vegetarian', 'Soft rice crepes with coconut chutney.', 'services-1.jpg'),
(3, 'Kori Rotti', 'Non-Vegetarian', 'Chicken curry with crispy rice wafers.', 'services-2.jpg'),
(3, 'Hebri Special Halwa', 'Dessert', 'Traditional sweet made with local ingredients.', 'services-3.jpg'),

-- Kundapura Taluk
(4, 'Kundapura Koli Saaru', 'Non-Vegetarian', 'Spicy chicken curry with rice.', 'services-1.jpg'),
(4, 'Kundapura Special Fish Curry', 'Non-Vegetarian', 'Traditional fish curry with coconut.', 'services-2.jpg'),
(4, 'Kundapura Special Sweet', 'Dessert', 'Traditional sweet made with jaggery.', 'services-3.jpg'),

-- Bramhavara Taluk
(5, 'Bramhavara Special Thali', 'Vegetarian', 'Traditional meal with local specialties.', 'services-1.jpg'),
(5, 'Bramhavara Special Dosa', 'Vegetarian', 'Crispy dosa with special chutney.', 'services-2.jpg'),
(5, 'Bramhavara Special Payasa', 'Dessert', 'Traditional sweet dish with local twist.', 'services-3.jpg'),

-- Byndoor Taluk
(6, 'Byndoor Special Fish Curry', 'Non-Vegetarian', 'Traditional fish curry with local spices.', 'services-1.jpg'),
(6, 'Byndoor Special Rice', 'Vegetarian', 'Traditional rice dish with local vegetables.', 'services-2.jpg'),
(6, 'Byndoor Special Sweet', 'Dessert', 'Traditional sweet made with local ingredients.', 'services-3.jpg'),

-- Kaup Taluk
(7, 'Kaup Special Seafood', 'Non-Vegetarian', 'Fresh seafood with local spices.', 'services-1.jpg'),
(7, 'Kaup Special Rice', 'Vegetarian', 'Traditional rice dish with local vegetables.', 'services-2.jpg'),
(7, 'Kaup Special Sweet', 'Dessert', 'Traditional sweet with local twist.', 'services-3.jpg'); 