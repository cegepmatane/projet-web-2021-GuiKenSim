--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2021-02-15 08:15:17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2832 (class 1262 OID 32852)
-- Name: boutiquecegep; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE boutiquecegep WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';


ALTER DATABASE boutiquecegep OWNER TO postgres;

\connect boutiquecegep

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2824 (class 0 OID 41044)
-- Dependencies: 202
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produit VALUES (1, 'T-Shrit des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 34.99, 'tshirt.jpg');
INSERT INTO public.produit VALUES (2, 'Chandail des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 44.99, 'chandail.jpg');
INSERT INTO public.produit VALUES (3, 'Manteau des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54.99, 'manteau.jpg');
INSERT INTO public.produit VALUES (5, 'Souris USB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15.99, 'souris.png');
INSERT INTO public.produit VALUES (6, 'Moniteur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120.99, 'ecran.jpg');
INSERT INTO public.produit VALUES (15, 'bouteille', 'une bouteille', 1.2, 'bouteille.jpg');
INSERT INTO public.produit VALUES (16, 'frites du mcdo', 'les belles frites', 3.2, 'frites du mcdo.jpg');
INSERT INTO public.produit VALUES (18, 'burger', 'coucou', 3.2, 'burger.jpg');
INSERT INTO public.produit VALUES (17, 'kebabe', '  un kebab dégueulasse ', 0.1, 'kebab.jpg');
INSERT INTO public.produit VALUES (4, 'Tasse de merde', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 999.99, 'tasse.jpg');
INSERT INTO public.produit VALUES (19, 'frites du mcdo', 'des bonnes frites', 3.2, 'frites du mcdo.jpg');


--
-- TOC entry 2826 (class 0 OID 49236)
-- Dependencies: 204
-- Data for Name: utilisateurs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.utilisateurs VALUES (1, 'FuZzyy14', 'simon.delarue2@gmail.com', '$2y$10$6m7xbK3eG6ufn2XFqxqtuO6c/N528IfBQ4DGfe8/.WfIQHKxikFBq');


--
-- TOC entry 2834 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produit_id_seq', 19, true);


-- Completed on 2021-02-15 08:15:17

--
-- PostgreSQL database dump complete
--

