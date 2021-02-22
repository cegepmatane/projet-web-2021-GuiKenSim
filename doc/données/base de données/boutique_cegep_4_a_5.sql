--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5
-- Dumped by pg_dump version 12.5

-- Started on 2021-02-22 09:34:23 EST

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
-- TOC entry 3165 (class 1262 OID 16417)
-- Name: boutiquecegep; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE boutiquecegep WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C' LC_CTYPE = 'C';


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
-- TOC entry 202 (class 1259 OID 16418)
-- Name: produit; Type: TABLE; Schema: public; Owner: postgres
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
-- TOC entry 203 (class 1259 OID 16424)
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
-- TOC entry 3166 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produit_id_seq OWNED BY public.produit.id;


--
-- TOC entry 205 (class 1259 OID 24619)
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    id integer NOT NULL,
    utilisateur_id integer,
    pseudo_utilisateur text,
    date timestamp with time zone,
    prix real,
    nom_facture text
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 24617)
-- Name: transactions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transactions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transactions_id_seq OWNER TO postgres;

--
-- TOC entry 3167 (class 0 OID 0)
-- Dependencies: 204
-- Name: transactions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transactions_id_seq OWNED BY public.transactions.id;


--
-- TOC entry 206 (class 1259 OID 24628)
-- Name: utilisateurs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utilisateurs_id_seq OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 24638)
-- Name: utilisateurs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.utilisateurs (
    id integer DEFAULT nextval('public.utilisateurs_id_seq'::regclass) NOT NULL,
    pseudo text,
    courriel character varying(80),
    motdepasse character varying(256)
);


ALTER TABLE public.utilisateurs OWNER TO postgres;

--
-- TOC entry 3019 (class 2604 OID 16426)
-- Name: produit id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit ALTER COLUMN id SET DEFAULT nextval('public.produit_id_seq'::regclass);


--
-- TOC entry 3020 (class 2604 OID 24622)
-- Name: transactions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions ALTER COLUMN id SET DEFAULT nextval('public.transactions_id_seq'::regclass);


--
-- TOC entry 3154 (class 0 OID 16418)
-- Dependencies: 202
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produit (id, titre, description, prix, image) VALUES (1, 'T-Shrit des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 34.99, 'tshirt.jpg');
INSERT INTO public.produit (id, titre, description, prix, image) VALUES (2, 'Chandail des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 44.99, 'chandail.jpg');
INSERT INTO public.produit (id, titre, description, prix, image) VALUES (3, 'Manteau des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54.99, 'manteau.jpg');
INSERT INTO public.produit (id, titre, description, prix, image) VALUES (5, 'Souris USB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15.99, 'souris.png');
INSERT INTO public.produit (id, titre, description, prix, image) VALUES (6, 'Moniteur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120.99, 'ecran.jpg');


--
-- TOC entry 3157 (class 0 OID 24619)
-- Dependencies: 205
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (1, 1, 'FuZzyy14', '2021-02-17 09:23:42.290694-05', 233.33, 'facture_date_1');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (3, 1, 'FuZzyy14', '2021-02-17 09:38:03.983547-05', 49.99, 'facture_date_1');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (2, 5, 'kenny', '2021-02-17 09:38:03.983547-05', 34.59, 'facture_date_2');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (4, 5, 'kenny', '2021-02-21 14:33:24.982524-05', 33.3, 'facture_');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (5, 5, 'kenny', '2021-02-21 14:40:46.375156-05', 33.3, '2021-02-21 14:40:46.375156-05');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (6, 5, 'kenny', '2021-02-21 14:43:56.524764-05', 33.3, 'facture_2021-02-21 14:43:56.524764-05');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (7, 5, 'kenny', '2021-02-21 14:45:01.213733-05', 33.3, 'facture_2021-02-21 14:45:01.213733-05_5');
INSERT INTO public.transactions (id, utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (8, 5, 'kenny', '2021-02-21 14:52:47.235693-05', 33.3, 'facture_2021-02-21_5');


--
-- TOC entry 3159 (class 0 OID 24638)
-- Dependencies: 207
-- Data for Name: utilisateurs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.utilisateurs (id, pseudo, courriel, motdepasse) VALUES (4, 'testConnexion', 'lemotdepassecestmotdepasse@gmail.com', '$2y$10$7aGnRtllM4RqOtbH9Ix/uOT07pp1S/JOxnvBuGjTla1CmNdSz2HkG');
INSERT INTO public.utilisateurs (id, pseudo, courriel, motdepasse) VALUES (1, 'FuZzyy14', 'simon.delarue2@gmail.com', '$2y$10$u0QYMr6Cp/cfFGOiNGB3AOXT2Z2h6nltyA70xNp3JNsIJRQC3Ibmm');
INSERT INTO public.utilisateurs (id, pseudo, courriel, motdepasse) VALUES (5, 'kenny', 'kennymarechal@gmail.com', '$2y$10$OCgHhvyLNUEzdTrtIwseJOS.VQ3ZJjCMkis9BllrNHQkUNRUrYl.i');
INSERT INTO public.utilisateurs (id, pseudo, courriel, motdepasse) VALUES (6, 'ken', 'ken@gmail.com', '$2y$10$zVBmRJcMn0mef34uHGJVreXxdg.QNYzi48z5SB1eP4F1p3Hx3TJOu');


--
-- TOC entry 3168 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produit_id_seq', 24, true);


--
-- TOC entry 3169 (class 0 OID 0)
-- Dependencies: 204
-- Name: transactions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transactions_id_seq', 8, true);


--
-- TOC entry 3170 (class 0 OID 0)
-- Dependencies: 206
-- Name: utilisateurs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.utilisateurs_id_seq', 6, true);


--
-- TOC entry 3023 (class 2606 OID 16428)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id);


--
-- TOC entry 3025 (class 2606 OID 24627)
-- Name: transactions transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (id);


--
-- TOC entry 3027 (class 2606 OID 24646)
-- Name: utilisateurs utilisateurs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utilisateurs
    ADD CONSTRAINT utilisateurs_pkey PRIMARY KEY (id);


-- Completed on 2021-02-22 09:34:23 EST

--
-- PostgreSQL database dump complete
--

