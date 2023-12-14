<%@ Page Title="Home Page" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true"
    CodeFile="Default.aspx.cs" Inherits="_Default" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
    <h2>
        <asp:Label ID="txtA" runat="server" Text="ID"></asp:Label>
        <asp:TextBox ID="txtId" runat="server"></asp:TextBox>
        <asp:Label ID="txtA0" runat="server" Text="NOMBRE"></asp:Label>
        <asp:TextBox ID="txtNombre" runat="server"></asp:TextBox>
    </h2>
    <p>
        &nbsp;<asp:Label ID="txtA2" runat="server" Text="APELLIDO"></asp:Label>
        <asp:TextBox ID="txtApellido" runat="server"></asp:TextBox>
        <asp:Label ID="txtA3" runat="server" Text="FECHA NACIMIENTO"></asp:Label>
        <asp:TextBox ID="txtFechaN" runat="server"></asp:TextBox>
        <asp:Button ID="btnActualizar" runat="server" onclick="btnActualizar_Click" 
            Text="Actualizar" />
        &nbsp;<asp:Button ID="btnAgregar" runat="server" Text="Agregar" 
            onclick="btnAgregar_Click" />
        <asp:Button ID="Button3" runat="server" Text="Borrar" onclick="Button3_Click" />
        <asp:Button ID="btnModificar" runat="server" Text="Modificar" 
            onclick="btnModificar_Click" />
        <asp:Button ID="btnBajas" runat="server" Text="Bajas" onclick="btnBajas_Click" 
            style="margin-bottom: 0px" />
        <asp:Button ID="btnAltas" runat="server" Text="Altas" onclick="btnBajas_Click" 
            style="margin-bottom: 0px" />
    </p>
    <p>
        <asp:Label ID="txtA5" runat="server" Text="TELEFONO"></asp:Label>
        <asp:TextBox ID="txtTelefono" runat="server"></asp:TextBox>
        <asp:Label ID="txtA4" runat="server" Text="EMAIL"></asp:Label>
        <asp:TextBox ID="txtEmail" runat="server"></asp:TextBox>
        <asp:Label ID="txtA6" runat="server" Text="CURSO"></asp:Label>
        <asp:TextBox ID="txtCurso" runat="server"></asp:TextBox>
        <asp:Label ID="txtA7" runat="server" Text="ESTADO"></asp:Label>
        <asp:TextBox ID="txtEstado" runat="server"></asp:TextBox>
        <asp:GridView ID="tabla" runat="server" 
            onselectedindexchanged="tabla_SelectedIndexChanged">
        </asp:GridView>
        <asp:Label ID="accion" runat="server" Text="Accion"></asp:Label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:Label ID="sel" runat="server" Text="nada"></asp:Label>
        </p>
</asp:Content>
