--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2021-02-22 10:03:40

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
-- TOC entry 2848 (class 1262 OID 32852)
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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 202 (class 1259 OID 41044)
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
-- TOC entry 203 (class 1259 OID 41050)
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
-- TOC entry 2849 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produit_id_seq OWNED BY public.produit.id;


--
-- TOC entry 206 (class 1259 OID 65698)
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
-- TOC entry 207 (class 1259 OID 65704)
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
-- TOC entry 2850 (class 0 OID 0)
-- Dependencies: 207
-- Name: transactions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transactions_id_seq OWNED BY public.transactions.id;


--
-- TOC entry 205 (class 1259 OID 57436)
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
-- TOC entry 204 (class 1259 OID 49236)
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
-- TOC entry 2702 (class 2604 OID 41052)
-- Name: produit id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit ALTER COLUMN id SET DEFAULT nextval('public.produit_id_seq'::regclass);


--
-- TOC entry 2704 (class 2604 OID 65706)
-- Name: transactions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions ALTER COLUMN id SET DEFAULT nextval('public.transactions_id_seq'::regclass);


--
-- TOC entry 2837 (class 0 OID 41044)
-- Dependencies: 202
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produit VALUES (3, 'Manteau des Capitaines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54.99, 'manteau.jpg');
INSERT INTO public.produit VALUES (5, 'Souris USB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15.99, 'souris.png');
INSERT INTO public.produit VALUES (4, 'Belle Tasse', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  ', 45, 'tasse.jpg');
INSERT INTO public.produit VALUES (2, 'Les Chandail des Capitaines', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 445.99, 'chandail.jpg');
INSERT INTO public.produit VALUES (6, 'Moniteur 2', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 120.999, 'ecran.jpg');


--
-- TOC entry 2841 (class 0 OID 65698)
-- Dependencies: 206
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transactions VALUES (2, 5, 'kenny', '2021-02-17 15:38:03.983547+01', 34.59, 'facture_date_2');
INSERT INTO public.transactions VALUES (4, 5, 'kenny', '2021-02-21 20:33:24.982524+01', 33.3, 'facture_');
INSERT INTO public.transactions VALUES (5, 5, 'kenny', '2021-02-21 20:40:46.375156+01', 33.3, '2021-02-21 14:40:46.375156-05');
INSERT INTO public.transactions VALUES (6, 5, 'kenny', '2021-02-21 20:43:56.524764+01', 33.3, 'facture_2021-02-21 14:43:56.524764-05');
INSERT INTO public.transactions VALUES (7, 5, 'kenny', '2021-02-21 20:45:01.213733+01', 33.3, 'facture_2021-02-21 14:45:01.213733-05_5');
INSERT INTO public.transactions VALUES (8, 5, 'kenny', '2021-02-21 20:52:47.235693+01', 33.3, 'facture_2021-02-21_5');
INSERT INTO public.transactions VALUES (1, 1, 'simon', '2021-02-17 15:23:42.290694+01', 233.33, 'facture_date_1');
INSERT INTO public.transactions VALUES (3, 1, 'simon', '2021-02-17 15:38:03.983547+01', 49.99, 'facture_date_1');


--
-- TOC entry 2839 (class 0 OID 49236)
-- Dependencies: 204
-- Data for Name: utilisateurs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.utilisateurs VALUES (3, 'AUSECOUR', 'ausecour@gmail.com', '%242y%2410%2487YpLM6CHfnFo5iccwXMEuBmtvMG9jdCLNi.nI0WCaS4.887VC1dq');
INSERT INTO public.utilisateurs VALUES (4, 'testConnexion', 'lemotdepassecestmotdepasse@gmail.com', '$2y$10$7aGnRtllM4RqOtbH9Ix/uOT07pp1S/JOxnvBuGjTla1CmNdSz2HkG');
INSERT INTO public.utilisateurs VALUES (18, 'kenny', 'kenny@gmail.com', '$2y$10$5u5ZLhCtTZhFe04VwzUukuRaYw0KILxMrhbp/hEMKBZn25EbvYlaO');
INSERT INTO public.utilisateurs VALUES (19, 'guillaume', 'dalbiguillaume@gmail.com', '$2y$10$B9tZl4Vbl51cbmpcUS1UHezx/v5chfFqMCobEJain88dfPOoYCcZS');
INSERT INTO public.utilisateurs VALUES (1, 'simon', 'simon.delarue2@gmail.com', '$2y$10$u0QYMr6Cp/cfFGOiNGB3AOXT2Z2h6nltyA70xNp3JNsIJRQC3Ibmm');


--
-- TOC entry 2851 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produit_id_seq', 21, true);


--
-- TOC entry 2852 (class 0 OID 0)
-- Dependencies: 207
-- Name: transactions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transactions_id_seq', 8, true);


--
-- TOC entry 2853 (class 0 OID 0)
-- Dependencies: 205
-- Name: utilisateurs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.utilisateurs_id_seq', 19, true);


--
-- TOC entry 2706 (class 2606 OID 41054)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id);


--
-- TOC entry 2710 (class 2606 OID 65708)
-- Name: transactions transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (id);


--
-- TOC entry 2708 (class 2606 OID 49243)
-- Name: utilisateurs utilisateurs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utilisateurs
    ADD CONSTRAINT utilisateurs_pkey PRIMARY KEY (id);


-- Completed on 2021-02-22 10:03:40

--
-- PostgreSQL database dump complete
--

