--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.5

-- Started on 2021-01-23 16:47:23 EST

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
-- TOC entry 2933 (class 1262 OID 16389)
-- Name: boutiquecegep; Type: DATABASE; Schema: -; Owner: Groupe Boutique
--

CREATE DATABASE boutiquecegep WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C.UTF-8' LC_CTYPE = 'C.UTF-8';


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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 203 (class 1259 OID 16392)
-- Name: produit; Type: TABLE; Schema: public; Owner: kenny
--

CREATE TABLE public.produit (
    id integer NOT NULL,
    titre character varying(50),
    description text,
    prix real,
    image character varying(200)
);


ALTER TABLE public.produit OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16390)
-- Name: produit_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produit_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produit_id_seq OWNER TO postgres;

--
-- TOC entry 2934 (class 0 OID 0)
-- Dependencies: 202
-- Name: produit_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produit_id_seq OWNED BY public.produit.id;


--
-- TOC entry 2797 (class 2604 OID 16395)
-- Name: produit id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit ALTER COLUMN id SET DEFAULT nextval('public.produit_id_seq'::regclass);


--
-- TOC entry 2927 (class 0 OID 16392)
-- Dependencies: 203
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produit VALUES (1, 'T-Shrit des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 34.99, 'null');
INSERT INTO public.produit VALUES (2, 'Chandail des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 44.99, 'null');
INSERT INTO public.produit VALUES (3, 'Manteau des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54.99, 'null');
INSERT INTO public.produit VALUES (4, 'Tasse des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 9.99, 'null');
INSERT INTO public.produit VALUES (5, 'Souris USB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15.99, 'null');
INSERT INTO public.produit VALUES (6, 'Moniteur', '"T-Shrit des Capitaines"
"Chandail des Capitaines"
"Manteau des Capitaines"
"Tasse des Capitaines"
"Souris USB"', 120.99, 'null');


--
-- TOC entry 2935 (class 0 OID 0)
-- Dependencies: 202
-- Name: produit_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produit_id_seq', 1, false);


--
-- TOC entry 2799 (class 2606 OID 16400)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id);


-- Completed on 2021-01-23 16:47:28 EST

--
-- PostgreSQL database dump complete
--

